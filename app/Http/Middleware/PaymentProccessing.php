<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PaymentProccessing {
    /**
    * Handle an incoming request.
    *
    * @param  \Closure( \Illuminate\Http\Request ): ( \Symfony\Component\HttpFoundation\Response )  $next
    */

    public function handle( Request $request, Closure $next ): Response {
        if ( !$request->has( [ 'order_id', 'status_code', 'transaction_status' ] ) ) {
            return redirect()->route( 'cart' );
        }
        return $next( $request );
    }
}
