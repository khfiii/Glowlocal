<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Barryvdh\Debugbar\Twig\Extension\Debug;
use Spatie\DiscordAlerts\Facades\DiscordAlert;

class PaymentHandler extends Controller {
    /**
    * Handle the incoming request.
    */

    public function __invoke( Request $request ) {
        $data = $request->all();

        $orderId = $data[ 'order_id' ];
        $statusCode = $data[ 'status_code' ];
        $transactionStatus = $data[ 'transaction_status' ];
        $grossAmount = $data[ 'gross_amount' ];
        $signatureKey = $data[ 'signature_key' ];

        // validate request from midtrans
        $validateSignature = hash( 'sha512', $orderId.$statusCode.$grossAmount.config( 'midtrans.production.server_key' ) );

        if ( $signatureKey != $validateSignature ) {
            return response()->json( [
                'message' => 'Invalid signature key'
            ], 401 );
        }

        $order = Order::find( $orderId );

        if ( !$order ) {
            return response()->json( [
                'message' => 'Order not found',
            ], 404 );
        }

        $user = $order->user;

        if ( $user->carts()->exists() ) {
            $user->carts()->delete();
        }

        $order->status = $transactionStatus;

        $order->save();

        if ( $transactionStatus == 'settlement' ) {
            DiscordAlert::message( '', [
                [
                    'title' => 'New Orders',
                    'description' => "**Name:** {$user->name}\n"
                    . "**Email:** {$user->email}\n"
                    . '**Transaction Status:** Success\n'
                    . "**Orders:** Order ID #{$orderId}\n"
                    . '**Gross Amount:** '.formatRupiah( $grossAmount ),
                    'color' => '#1c71d8',
                    'footer' => [
                        'text' => 'Transaction processed on ' . $order->created_at->toDateTimeString()
                    ]
                ]
            ] );
        }

        return response()->json( [
            'message' => 'success'
        ], 200 );

    }
}
