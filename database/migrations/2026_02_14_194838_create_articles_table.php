<?php

use App\Models\Color;
use App\Models\Product;
use App\Models\Site;
use App\Models\User;
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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
            $table->text('description');
            $table->decimal('price', 10, 2)->default(0);
            $table->decimal('cost_price', 10, 2)->nullable();
            $table->decimal('discount_price', 10, 2)->nullable();
            $table->boolean('is_active')->default(true);
            $table->boolean('is_featured')->default(false);
            $table->integer('quantity')->default(0);
            $table->integer('min_quantity')->default(0);
            $table->string('supplier_name')->nullable();
            $table->string('supplier_code')->nullable();
            $table->json('attributes')->nullable();
            $table->foreignIdFor(Product::class)->nullable();
            $table->foreignIdFor(Site::class);
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Color::class)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
