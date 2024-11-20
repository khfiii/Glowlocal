<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MidtransServiceProvider extends ServiceProvider {
    /**
    * Register services.
    */

    public function register(): void {
        //
    }

    /**
    * Bootstrap services.
    */

    public function boot(): void {
        // \Midtrans\Config::$serverKey = config( 'midtrans.production.server_key' );

        // // Set to Development/Sandbox Environment ( default ). Set to true for Production Environment ( accept real transaction ).
        // \Midtrans\Config::$isProduction = config( 'midtrans.production.is_production' );
        // // Set sanitization on ( default )
        // \Midtrans\Config::$isSanitized = true;
        // // Set 3DS transaction for credit card to true
        // \Midtrans\Config::$is3ds = true;

        \Midtrans\Config::$serverKey = config( 'midtrans.stagging.server_key' );

        // Set to Development/Sandbox Environment ( default ). Set to true for Production Environment ( accept real transaction ).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on ( default )
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
    }
}
