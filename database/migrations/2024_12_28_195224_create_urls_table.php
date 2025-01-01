<?php

use App\Models\Site;
use App\Models\Url;
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
        Schema::create('urls', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Site::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Url::class, 'parent_id')->nullable()->constrained('urls')->cascadeOnDelete();
            $table->string('name');
            $table->string('path');
            $table->integer('order')->default(0);
            $table->boolean('to_nav')->default(false);
            $table->boolean('header')->default(false);
            $table->boolean('footer')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('urls');
    }
};
