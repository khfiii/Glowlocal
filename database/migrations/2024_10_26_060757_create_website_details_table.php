<?php

use App\Models\Website;
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
        Schema::create('website_details', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Website::class)->constrained()->onDelete('cascade');
            $table->json('data');
            $table->json('pagesHtml');                                                                                                                                                                                                                                                                                                             
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('website_details');
    }
};
