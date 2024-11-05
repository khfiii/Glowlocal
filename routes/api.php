<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StoreWebsite;

Route::get( 'website/{website:slug}', [ StoreWebsite::class, 'index' ] );
Route::patch( 'store/website/{slug}', [ StoreWebsite::class, 'store' ] );
