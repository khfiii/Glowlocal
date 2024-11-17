<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class PaymentController extends Controller {
    public function index( Request $request ) {
        $order = Order::findOrFail( $request->order_id );
        $order->status = $request->transaction_status;
        $order->save();
        auth()->user()->carts()->delete();

        return redirect()->route( 'shopping-history' );

    }
}
