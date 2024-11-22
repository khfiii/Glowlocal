<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\Url;
use App\Models\CategoryProduct;
use Livewire\Attributes\Computed;
use Illuminate\Support\Collection;

class ProductPages extends Component {

    public int $onPage = 5;

    public $categoryId = null;

    #[ Computed ]

    public function products(): Collection {
        if ( is_null( $this->categoryId ) || $this->categoryId == '' ) {
            return Product::with( 'category', 'media' )->latest()->take( $this->onPage )->get();
        } else {
            return Product::where( 'category_id', $this->categoryId )->with( 'category', 'media' )->latest()->take( $this->onPage )->get();

        }
    }

    public function loadMore(): void {
        $this->onPage += 5;

    }

    public function render() {
        $categories = Category::select( 'id', 'name' )->get();
        return view( 'livewire.product-pages', compact( 'categories' ) );
    }

    public function setCategoryId( $id ) {
        $this->categoryId = $id;
    }
}
