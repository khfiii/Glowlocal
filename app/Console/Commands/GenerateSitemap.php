<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapGenerator;

class GenerateSitemap extends Command {
    /**
    * The name and signature of the console command.
    *
    * @var string
    */
    protected $signature = 'generate-sitemap';

    /**
    * The console command description.
    *
    * @var string
    */
    protected $description = 'Create a sitemap for laravel projects';

    /**
    * Execute the console command.
    */

    public function handle() {
        try {
            $path = public_path( 'sitemap.xml' );
            $url = config( 'app.url' );
            // Menjalankan perintah SitemapGenerator
            SitemapGenerator::create( $url )
            ->writeToFile( $path );

            $this->info( 'Sitemap berhasil dibuat di ' . $path );
        } catch ( \Exception $e ) {
            $this->error( 'Terjadi kesalahan: ' . $e->getMessage() );
        }

    }

}
