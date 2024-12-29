<?php

use App\Models\Category;
use App\Models\Site;
use App\Models\Unit;
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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->integer('status')->default(1);
            $table->string('sku')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->string('tags')->nullable();
            $table->text('content')->nullable();
            $table->json('options')->nullable();
            $table->integer('discount')->nullable();
            $table->integer('stock')->nullable();
            $table->string('slug');
            $table->foreignIdFor(Site::class);
            $table->foreignIdFor(Category::class)->nullable();
            $table->foreignIdFor(Unit::class)->nullable();
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
