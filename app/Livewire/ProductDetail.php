<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Masmerise\Toaster\Toaster;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProductDetail extends Component {
    public Product $product;

    public $defaultUrl;

    public function mount() {
        $this->defaultUrl = url()->current() ?? route( 'home' );

    }

    public function addToChart( Product $product ) {

        if ( !Auth::check() ) {
            Session::put( 'url.intended', $this->defaultUrl );
            return redirect()->route( 'login' );
        }

        $user = auth()->user();

        if ( !auth()->user()->cart ) {
            Toaster::warning( 'Fitur Keranjang Belum Aktif' );
        }

        try {

            DB::beginTransaction();

            if ( $existing = $user->cart->items->where( 'product_id', $product->id )->first() ) {
                // Jika item sudah ada, tambahkan quantity
                $existing->quantity += 1;
                $existing->price = $product->price * $existing->quantity;
                $existing->save();
            } else {
                $user->cart->items()->create( [
                    'product_id' => $product->id,
                    'quantity' => 1,
                    'price' => $product->price
                ] );
            }

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
        return view( 'livewire.product-detail' );
    }
}
