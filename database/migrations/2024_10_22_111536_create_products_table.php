<?php

use App\Models\Category;
use App\Models\CategoryProduct;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title'); 
            $table->string('slug');
            $table->text('product_url');
            $table->string('rating')->nullable(); 
            $table->longText('description')->nullable(); 
            $table->foreignIdFor(Category::class)->constrained()->onDelete('cascade'); 
            $table->integer('price'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
