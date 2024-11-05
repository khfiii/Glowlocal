<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CategoryProduct;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoryProductSeeder extends Seeder {
    /**
    * Run the database seeds.
    */

    public function run(): void {
        Category::create( [
            'name' => 'Ebook'
        ] );
        Category::create( [
            'name' => 'Kecantikan'
        ] );
        Category::create( [
            'name' => 'Barang Unik'
        ] );

    }
}
