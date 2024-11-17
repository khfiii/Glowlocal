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

        $order = [   
            'user_id' => $this->user->id, 
            'total_price' => $this->total , 
            'noted' => $this->noted, 
            'status' => 'pending', 
        ]; 



        try {

            $params = [
                'transaction_details' => [
                    'order_id' => 'AD'. now()->format('dmyhs'),
                    'gross_amount' => $order['total_price'],
                ],
                'expiry' => [
                    'start_time' => date('Y-m-d H:i:s T'), // Tanggal & waktu sekarang
                    'unit' => 'minutes', // Satuan waktu (minutes, hours, days)
                    'duration' => 10 // Kadaluarsa dalam 60 menit
                ],
                'customer_details' => [
                    'first_name' => $validated['name'],
                    'email' => $validated['email'],
                ],
            ];

            $snapToken = Snap::getSnapToken($params);
            $this->dispatch('user-pay', token:$snapToken, order:$order); 
        } catch (\Throwable $th) {
            //throw $th;
        }

    }

    #[On('payment-success')] 
    public function handleSuccess($result, $order){

        try {
            DB::beginTransaction();
            $order['status'] = $result['transaction_status'];
            $orderRecord = Order::create($order); 
            $cartItems = $this->user->load('carts.product');
               foreach ($cartItems->carts as $item) {
                OrderItem::create([
                    'order_id' => $orderRecord->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->product->price * $item->quantity,
                ]);

             }
            
             DB::commit();
            Toaster::success( 'Pembayaran Berhasil File Akan Dikirimkan Ke Email Anda' );
            $this->dispatch( 'add-chart' );
            $this->user->carts()->delete(); 
            return redirect()->route('shopping-history');

        } catch (\Throwable $th) {
            Toaster::warning( 'Terjadi Kesalahan Coba Lagi Beberapa Saat' );
            DB::rollback();
            Log::info( $th );
        }
    }
    #[On('payment-closed')] 
    public function handleClosed($result, $order){
        Toaster::warning( 'Mohon Selesaikan Pembayaran Anda' );
    }
}
