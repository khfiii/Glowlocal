<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\CartItem;
use Masmerise\Toaster\Toaster;

class CartLayout extends Component {

    public $subtotal = 0;
    public $layanan = 2000;
    public $total; 
    public $email; 
    public $name; 
    public $cartItems;

    public function removeItem( CartItem $item ) {
        $item->delete();
        $this->dispatch( 'add-chart' );
        $this->dispatch( 'refresh' );
        Toaster::success( 'Item di hapus dari keranjang' );
    }

    public function render() {


        $this->cartItems = auth()->check() && auth()->user()->cart
        ? auth()->user()->cart->load( 'items.product.media' )->items
        : collect();

        $this->subtotal = $this->cartItems->sum(function($item){
            return $item->product->price * $item->quantity; 
        });

        $this->total = $this->subtotal + $this->layanan; 

        $this->name = auth()->user()->name; 
        $this->email = auth()->user()->email; 

        // Kembalikan collection kosong jika cart atau user tidak ada

        return view( 'livewire.cart-layout' );
    }

    public function increase( CartItem $item ) {
        if ( $item ) {
            $item->quantity++;
            $item->save();
        }

    }

    public function decrease( CartItem $item ) {
        if ( $item && $item->quantity > 1 ) {
            $item->quantity--;
            $item->save();
        }
    }
}
