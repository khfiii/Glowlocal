<?php

namespace App\Livewire;

use Livewire\Component;
use Masmerise\Toaster\Toaster;
use App\Services\DiscordWebhook;
use Illuminate\Support\Facades\Log;

class RequestProduct extends Component {
    public $message;

    public $active = false;

    public function render() {
        return view( 'livewire.request-product' );
    }

    public function send( DiscordWebhook $discord ) {
        $this->validate( [
            'message' => 'required'
        ] );

        try {
            $send =  $discord->sendEmbedMessage(
                'Product Request',
                "**Judul:** {$this->message}\n"

            );

            Toaster::success( 'Request Product Berhasil, Tunggu 1 x 24 jam ya' );

            $this->reset( 'message' );
            $this->active = false;

        } catch ( \Throwable $th ) {
            Log::info( $th );
            Toaster::warning( 'Terjadi Kesalahan, coba lagi nanti ya' );
            //throw $th;
        }

    }
}
