<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ProductDetail extends Component {
    public Product $product;

    public function addToChart( Product $product ) {
        if ( !Auth::check() ) {
            return redirect()->route( 'login' );
        }

    }

    public function render() {
        return view( 'livewire.product-detail' );
    }
}
