<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class DiscordWebhook {
    /**
    * Create a new class instance.
    */

    public string $discord_webhook;

    public function __construct() {
        $this->discord_webhook = config( 'services.discord.webhook_url' );
    }

    public function sendEmbedMessage( string $title, string $description, string $color = '#1c71d8' ) {
        $embed = [
            'embeds' => [
                [
                    'title' => $title,
                    'description' => $description,
                    'color' => hexdec( $color ),  // Mengonversi warna ke format RGB
                    'timestamp' => now()->toIso8601String(), // Menambahkan timestamp saat ini
                ]
            ]
        ];

        try {
            // Kirim pesan ke Discord Webhook dengan timeout
            $response = Http::timeout( 10 )  // Timeout 10 detik
            ->post( $this->discord_webhook, $embed );

            // Mengecek apakah respons berhasil
            if ( $response->failed() ) {
                // Jika gagal, lempar exception dengan status kode error
                throw new \Exception( 'Gagal mengirim pesan ke Discord. Status: ' . $response->status() );
            }

            return $response;

        } catch ( RequestException $e ) {
            // Menangani kesalahan dari HTTP Client ( timeout, dll )
            \Log::error( 'Timeout atau kesalahan lain saat mengirim ke Discord: ' . $e->getMessage() );
            throw new \Exception( 'Timeout atau kesalahan jaringan terjadi saat mengirim pesan ke Discord.' );
        } catch ( \Exception $e ) {
            // Menangani kesalahan umum lainnya
            \Log::error( 'Kesalahan saat mengirim pesan ke Discord: ' . $e->getMessage() );
            throw new \Exception( 'Terjadi kesalahan saat mengirim pesan ke Discord.' );
        }
    }
}
