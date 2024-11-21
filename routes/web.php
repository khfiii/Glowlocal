<?php

use App\Models\User;
use App\Models\Article;
use App\Models\Website;
use App\Models\ProductType;
use Illuminate\Http\Request;
use App\Models\WebsiteDetail;
use Illuminate\Support\Carbon;
use App\Models\ArticleCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\ShoppingController;

Route::get( '/', [ HomeController::class, 'index' ] )->name( 'home' );
Route::get( 'produk', [ ProductController::class, 'index' ] )->name( 'product' );
Route::get( 'product/{product:slug}', [ ProductController::class, 'detail' ] )->name( 'product.detail' );
Route::view( '/tentang', 'pages.contact' )->name( 'contact' );
Route::get( '/artikel', [ ArticleController::class, 'index' ] )->name( 'artikel' );
Route::get( '/artikel/{slug}', [ ArticleController::class, 'detail' ] )->name( 'detail.article' );

Route::get( 'shopping-history', [ ShoppingController::class, 'index' ] )
->name( 'shopping-history' );

Route::get( '/cart', [ CartController::class, 'index' ] )
->middleware( [ 'auth' ] )
->name( 'cart' );

require __DIR__.'/auth.php';
