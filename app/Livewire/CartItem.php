<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class CartItem extends Component {

    protected $listeners = [
        'add-chart' => '$refresh'
    ];

    public function render() {
        return view( 'livewire.cart-item', [
            'cart' => auth()->user()?->cart ,
        ] );
    }
}
