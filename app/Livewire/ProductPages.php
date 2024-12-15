<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use Masmerise\Toaster\Toaster;
use App\Models\CategoryProduct;
use Livewire\Attributes\Computed;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProductPages extends Component {
    use WithPagination;

    public int $onPage = 10;

    public ?string $search = '';

    public $defaultUrl;

    public function mount() {
        $this->defaultUrl = url()->current() ?? route( 'home' );

    }

    #[ Computed ]

    public function products() {
        $query = Product::with( 'category', 'media' )->latest();

        if ( !empty( $this->search ) ) {
            $query->where( 'title', 'like', '%' . $this->search . '%' );
        }

        return $query->paginate( 12 );

    }

    public function loadMore(): void {
        $this->onPage += 5;

    }

    public function addToChart( Product $product ) {

        if ( !Auth::check() ) {
            Session::put( 'url.intended', $this->defaultUrl );
            return $this->dispatch( 'login', client_id:config( 'services.google.client_id' ) );
        }

        $user = auth()->user();

        if ( !auth()->user()->carts ) {
            Toaster::warning( 'Fitur Keranjang Belum Aktif' );
        }

        try {

            DB::beginTransaction();

            $user->carts()->updateOrCreate(
                // Kondisi pencocokan
                [ 'product_id' => $product->id ],
                // Data yang akan diupdate atau dibuat
                [ 'quantity' => DB::raw( 'quantity + 1' ) ]
            );

            DB::commit();
            $this->dispatch( 'add-chart' );
            Toaster::success( 'Berhasil memasukan ke keranjang' );

        } catch ( \Throwable $th ) {
            Toaster::warning( 'Terjadi Kesalahan Coba Lagi Beberapa Saat' );
            DB::rollback();
            Log::info( $th );

        }

        $this->dispatch( 'add-chart' );

    }

    public function render() {
        $categories = Category::select( 'id', 'name' )->get();
        return view( 'livewire.product-pages', compact( 'categories' ) );
    }

    public function setCategoryId( $id ) {
        $this->categoryId = $id;
    }
}
