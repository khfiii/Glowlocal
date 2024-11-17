<?php

return [
    'stagging' =>[
        'client_key' => env( 'MIDTRANS_STAGGING_CLIENT_KEY' ),
        'merchant_id' => env( 'MIDTRANS_STAGGING_MERCHANT_ID' ),
        'server_key' => env( 'MIDTRANS_STAGGING_SERVER_KEY' )
    ],
    'production' =>[
        'is_production' => true, // Set ke true untuk produksi
        'merchant_id' => env( 'MIDTRANS_MERCHANT_ID' ), // Set ke true untuk produksi
        'server_key' => env( 'MIDTRANS_SERVER_KEY' ),
        'client_key' => env( 'MIDTRANS_CLIENT_KEY' ),
    ]
];