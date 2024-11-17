<?php

namespace App\Livewire;

use App\Models\Cart;
use Livewire\Component;
use Livewire\Attributes\On;

class CartItem extends Component {

    protected $listeners = [
        'add-chart' => '$refresh'
    ];

    public function render() {
        return view( 'livewire.cart-item', [
            'cartCounts' => Cart::count() ,
        ] );
    }
}
