<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\CategoryProductSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'Asbahul Kahfi',
            'email' => 'khfii635@gmail.com',
            'password' => 'Kahfi635@',
        ]);

        $this->call([
            CategoryProductSeeder::class
        ]);
    }
}
