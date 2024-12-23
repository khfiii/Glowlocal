<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class ShoppingController extends Controller {
    public function index() {
        $orders = Order::where('user_id', auth()->user()->id)
        ->whereHas('items')
        ->with('items.product.media')
        ->latest()
        ->get()
        ->fresh(); // Memastikan data terbaru dari database.
    

        return view( 'pages.history', compact( 'orders' ) );
    }
}
