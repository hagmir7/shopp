<?php

use App\Models\Product;
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
        Schema::create('dimensions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Product::class);
            $table->foreignIdFor(Unit::class);
            $table->string('value')->nullable();
            $table->string('code')->nullable();
            $table->string('stock')->nullable();
            $table->float('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dimensions');
    }
};
