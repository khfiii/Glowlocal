<?php

use App\Models\Website;
use App\Models\ProductType;
use App\Models\WebsiteDetail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WebsiteController;

Route::view( '/', 'pages.home' )->name( 'home' );
Route::get( 'product', [ ProductController::class, 'index' ] )->name( 'product' );
Route::get( 'product/{product:slug}', [ ProductController::class, 'detail' ] )->name( 'product.detail' );
Route::view( '/template', 'pages.template' )->name( 'template' );
Route::view( '/ketentuan-layanan', 'pages.contact' )->name( 'contact' );
Route::get( '/blog', [ BlogController::class, 'index' ] )->name( 'blog' );
Route::get( '/blog/{slug}', [ BlogController::class, 'detail' ] )->name( 'detail.blog' );

Route::get( '/pages/visit/{slug}', [ WebsiteController::class, 'visit' ] )->name( 'page.visit' );
Route::get( '/pages/manage/{website:slug}', [ WebsiteController::class, 'manage' ] )->name( 'page.manage' );

require __DIR__.'/auth.php';
