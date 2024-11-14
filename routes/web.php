<?php

use App\Models\User;
use App\Models\Website;
use App\Models\ProductType;
use Illuminate\Http\Request;
use App\Models\WebsiteDetail;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WebsiteController;

Route::get( '/', [ HomeController::class, 'index' ] )->name( 'home' );
Route::get( 'product', [ ProductController::class, 'index' ] )->name( 'product' );
Route::get( 'product/{product:slug}', [ ProductController::class, 'detail' ] )->name( 'product.detail' );
Route::view( '/ketentuan-layanan', 'pages.contact' )->name( 'contact' );
Route::get( '/blog', [ BlogController::class, 'index' ] )->name( 'blog' );
Route::get( '/blog/{slug}', [ BlogController::class, 'detail' ] )->name( 'detail.blog' );
Route::get( '/cart', [ CartController::class, 'index' ] )
->middleware( [ 'auth' ] )
->name( 'cart' );

require __DIR__.'/auth.php';
