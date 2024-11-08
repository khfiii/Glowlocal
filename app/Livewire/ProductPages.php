<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Models\CategoryProduct;

class ProductPages extends Component {

    public $products;

    public function mount() {
        $this->products = Product::with( 'category', 'media' )
        ->orderBy( 'category_id', 'asc' )
        ->latest()
        ->get();

    }

    public function render() {
        return view( 'livewire.product-pages' );
    }
}
