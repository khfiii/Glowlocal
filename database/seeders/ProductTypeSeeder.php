<?php

namespace Database\Seeders;

use App\Enums\ProductType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productTypeList = new \ReflectionEnum(ProductType::class);

        foreach($productTypeList->getCases() as $productType){
            \App\Models\ProductType::create([
                'name' => $productType->getvalue()->value,
            ]);
        }
    }
}
