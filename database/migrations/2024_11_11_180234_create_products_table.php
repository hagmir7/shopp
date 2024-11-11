<?php

use App\Models\Category;
use App\Models\Site;
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
            $table->decimal('price', 10, 2);
            $table->text('content');
            $table->text('options');
            $table->foreignIdFor(Site::class);
            $table->string('slug');
            $table->string('status');
            $table->string('sku')->nullable();
            $table->text('tags');
            $table->decimal('old_price', 10, 2)->nullable();
            $table->foreignIdFor(Category::class);
            $table->timestamps();
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
