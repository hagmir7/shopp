<?php

use App\Models\Address;
use App\Models\City;
use App\Models\Country;
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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId(User::class)->nullable();
            $table->foreignId(Address::class)->nullable();
            $table->string('full_name');
            $table->integer('status')->default(1);
            $table->decimal('total_amount', 10, 2);
            $table->string('phone');
            $table->string('email')->nullable();
            $table->foreignId(Country::class)->nullable();
            $table->string('zip_code')->nullable();
            $table->string('region')->nullable();
            $table->foreignId(City::class)->nullable();
            $table->text('address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
