<?php

namespace App\Console\Commands;

use App\Models\Article;
use App\Models\Product;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Illuminate\Console\Command;

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
    protected $description = 'Create a sitemap for Laravel projects';

    /**
     * Execute the console command.
     */
    public function handle() {
        try {
            // Tentukan path untuk menyimpan sitemap
            $path = public_path('sitemap.xml');

            // URL dasar dari aplikasi
            $baseUrl = rtrim(config('app.url'), '/');

            // Inisialisasi Sitemap
            $sitemap = Sitemap::create();

            $sitemap->add(
                Url::create($baseUrl) // Asumsi produk memiliki slug
                        ->setLastModificationDate(now()) // Tanggal modifikasi terakhir
                        ->setChangeFrequency('weekly') // Frekuensi perubahan (opsio[nal)
                        ->setPriority(0.8) // Prioritas URL (opsional)
            );
           
            $sitemap->add(
                Url::create("{$baseUrl}/produk") // Asumsi produk memiliki slug
                        ->setLastModificationDate(now()) // Tanggal modifikasi terakhir
                        ->setChangeFrequency('weekly') // Frekuensi perubahan (opsional)
                        ->setPriority(0.8) // Prioritas URL (opsional)
            );

             // Ambil semua produk dan tambahkan ke sitemap
             Product::all()->each(function ($product) use ($sitemap, $baseUrl) {
                $sitemap->add(
                    Url::create("{$baseUrl}/produk/{$product->slug}") // Asumsi produk memiliki slug
                        ->setLastModificationDate($product->updated_at) // Tanggal modifikasi terakhir
                        ->setChangeFrequency('weekly') // Frekuensi perubahan (opsional)
                        ->setPriority(0.8) // Prioritas URL (opsional)
                );
            });

            $sitemap->add(
                Url::create("{$baseUrl}/artikel") // Asumsi produk memiliki slug
                        ->setLastModificationDate(now()) // Tanggal modifikasi terakhir
                        ->setChangeFrequency('weekly') // Frekuensi perubahan (opsional)
                        ->setPriority(0.8) // Prioritas URL (opsional)
            );

            Article::all()->each(function ($artikel) use ($sitemap, $baseUrl) {
                $sitemap->add(
                    Url::create("{$baseUrl}/artikel/{$artikel->slug}") // Asumsi produk memiliki slug
                        ->setLastModificationDate($artikel->updated_at) // Tanggal modifikasi terakhir
                        ->setChangeFrequency('weekly') // Frekuensi perubahan (opsional)
                        ->setPriority(0.8) // Prioritas URL (opsional)
                );
            });


            $sitemap->add(
                Url::create("{$baseUrl}/tentang") // Asumsi produk memiliki slug
                        ->setLastModificationDate(now()) // Tanggal modifikasi terakhir
                        ->setChangeFrequency('weekly') // Frekuensi perubahan (opsional)
                        ->setPriority(0.8) // Prioritas URL (opsional)
            );

            // Tulis sitemap ke file
            $sitemap->writeToFile($path);

            $this->info('Sitemap berhasil dibuat di ' . $path);
        } catch (\Exception $e) {
            $this->error('Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
