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

        $cartCounts = auth()->check() ? Cart::where( 'user_id', auth()->user()->id )->count() : 0;

        return view( 'livewire.cart-item', [
            'cartCounts' => $cartCounts,
        ] );
    }
}
