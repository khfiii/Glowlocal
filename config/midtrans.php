<?php

return [
    'stagging' =>[
        'client_key' => env('STAGGING_CLIENT_KEY'),
        'merchant_id' => env('STAGGING_MERCHANT_ID'), 
        'server_key' => env('STAGGING_SERVER_KEY')
    ], 
    'production' =>[]
];