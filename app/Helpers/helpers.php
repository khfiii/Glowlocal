<?php

if ( !function_exists( 'formatRupiah' ) ) {
    /**
    * Format number to Indonesian Rupiah currency.
    *
    * @param int|float $amount
    * @return string
    */

    function formatRupiah( $amount ) {
        return 'Rp. ' . number_format( $amount, 0, ',', '.' );
    }
}

if ( !function_exists( 'readDuration' ) ) {
    function readDuration( ...$text ) {
        $totalWords = str_word_count( implode( ' ', $text ) );
        $minutesToRead = round( $totalWords / 200 );

        return ( int )max( 1, $minutesToRead );
    }
}
