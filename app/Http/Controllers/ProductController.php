<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class ProductController extends Controller {
    public function index() {
        return view( 'pages.product' );
    }

    public function detail( Product $product ) {
        return view( 'pages.product-detail', compact( 'product' ) );
    }
}
