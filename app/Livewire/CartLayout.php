<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\CartItem;
use Masmerise\Toaster\Toaster;

class CartLayout extends Component {

    public $subtotal = 0;
    public $layanan = 0;
    public $total; 
    public $user; 
    public $email; 
    public $name; 
    public $noted; 
    public $cartItems;

    public function removeItem( CartItem $item ) {
        $item->delete();
        $this->dispatch( 'add-chart' );
        $this->dispatch( 'refresh' );
        $this->loadItems(); 
        Toaster::success( 'Item di hapus dari keranjang' );

    }

    public function render() {

        $this->user = auth()->user();
        $this->name = auth()->user()->name; 
        $this->email = auth()->user()->email; 

        // Kembalikan collection kosong jika cart atau user tidak ada
        $this->loadItems();

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

    public function updateQuantity($itemId, $quantity)
    {
        $item = CartItem::find($itemId);

        if ($item) {
            $item->quantity = $quantity;
            $item->save();
        }
    }

    public function loadItems(){
        $this->cartItems = auth()->check() && auth()->user()->cart
        ? auth()->user()->cart->load( 'items.product.media' )->items
        : collect();

        $this->subtotal = $this->cartItems->sum(function($item){
            return $item->product->price * $item->quantity; 
        });

        $this->total = $this->subtotal + $this->layanan; 
    }

    public function checkout(){
       $validated =  $this->validate([
            'email' => 'required', 
            'name' => 'required', 
        ]); 

        $data = [
            'user_id' => $this->user->id, 
            'total_price' => $this->total , 
            'noted' => $this->noted, 

        ]; 

        dd($data); 
    }
}
