<?php

namespace App\Livewire;

use Midtrans\Snap;
use App\Models\Cart;
use App\Models\Order;
use Livewire\Component;
use App\Models\CartItem;
use App\Models\OrderItem;
use Livewire\Attributes\On;
use Masmerise\Toaster\Toaster;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CartLayout extends Component {

    public $subtotal = 0;
    public $layanan = 0;
    public $total; 
    public $user; 
    public $email; 
    public $name; 
    public $noted; 
    public $cartItems;
    
    public function removeItem(Cart $item ) {
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

    public function updateQuantity($itemId, $quantity)
    {
        $item = Cart::find($itemId);

        if ($item) {
            $item->quantity = $quantity;
            $item->save();
        }
    }

    public function loadItems(){
        $this->cartItems = Cart::where('user_id', auth()->user()->id)->with('product.media')->get();

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
        
        $cartItems = $this->user->load('carts.product');
        
        $data =  [   
            'user_id' => $this->user->id, 
            'total_price' => $this->total , 
            'noted' => $this->noted, 
            'status' => 'pending', 
        ]; 

        
        
        try {
        DB::beginTransaction();
        
        $order = Order::create($data);
        
        foreach ($cartItems->carts as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->price * $item->quantity,
            ]);
        }

             // Buat item_details untuk setiap produk di cart
        $itemDetails = $cartItems->carts->map(function ($item) {
            return [
                'id' => $item->id,
                'price' => $item->product->price,
                'quantity' => $item->quantity,
                'name' => $item->product->title,
            ];
        })->toArray();

                  // Parameter transaksi
            $params = [
                'transaction_details' => [
                    'order_id' => $order->id,
                    'gross_amount' => $order->total_price,
                ],
                'item_details' => $itemDetails, // Tambahkan item details
                'expiry' => [
                    'start_time' => date('Y-m-d H:i:s T'),
                    'unit' => 'minutes',
                    'duration' => 10,
                ],
                'customer_details' => [
                    'first_name' => $validated['name'],
                    'email' => $validated['email'],
                ],
            ];

            $paymentUrl = Snap::createTransaction($params)->redirect_url;
            DB::commit();
            return redirect($paymentUrl);
        } catch (\Throwable $th) {
            DB::rollback();
            Log::info( $th );
        }

    }
}
