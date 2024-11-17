<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class ShoppingController extends Controller {
    public function index() {
        $orders = Order::where( 'user_id', auth()->user()->id )
        ->with( 'items.product.media' )->latest()->get();

        return view( 'pages.history', compact( 'orders' ) );
    }
}
