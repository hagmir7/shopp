<?php

use App\Models\Article;
use App\Models\Package;
use App\Models\Product;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('article_package', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Article::class);
            $table->foreignIdFor(Package::class);
            $table->foreignIdFor(Product::class)->nullable();
            $table->integer('quantity')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article_package');
    }
};
