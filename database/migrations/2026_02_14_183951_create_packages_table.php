<?php

use App\Models\Dimension;
use App\Models\Product;
use App\Models\Shipping;
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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('costumer_name');
            $table->string('product_name');
            $table->string('phone');
            $table->string('city');
            $table->decimal('price', 10, 2)->default(0);
            $table->integer('status')->default(0);
            $table->string('address')->nullable();
            $table->string('tracking_number')->nullable()->unique();
            $table->dateTime('delivered_at')->nullable();
            $table->dateTime('shipped_at')->nullable();
            $table->integer('shipping_price')->nullable();
            $table->text('note')->nullable();
            $table->foreignIdFor(Shipping::class)->nullable();
            $table->foreignIdFor(Site::class)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
