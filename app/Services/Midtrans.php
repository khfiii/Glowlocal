<?php

namespace App\Services;

class Midtrans
{
    /**
     * Create a new class instance.
     */
    public function __construct(private string $serverKey, private bool $isProduction=false)
    {
        \Midtrans\Config::$serverKey = $serverKey;

        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = $isProduction;

        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
    }

    public function generateSnapToken(array $params){
        return \Midtrans\Snap::getSnapToken($params);
    }
}
