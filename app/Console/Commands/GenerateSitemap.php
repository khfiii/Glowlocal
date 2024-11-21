<?php

namespace App\Console\Commands;

use App\Models\Article;
use Spatie\Sitemap\Tags\Url;
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
            SitemapGenerator::create( 'http://127.0.0.1:8000' )
            ->getSitemap()
            ->add(...Article::all()->map(function ($article) {
                return Url::create(route('detail.article', $article->slug)) // atau slug
                    ->setLastModificationDate($article->updated_at)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                    ->setPriority(0.8);
            })->toArray()) // Konversi koleksi ke ar
            ->writeToFile( $path );

            $this->info( 'Sitemap berhasil dibuat di ' . $path );
        } catch ( \Exception $e ) {
            $this->error( 'Terjadi kesalahan: ' . $e->getMessage() );
        }

    }

}
