<?php

use App\Models\Article;
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
        Schema::create('movements', function (Blueprint $table) {
            $table->id();
            $table->integer('type')->comment('1=stock in, 2=stock out, 3=adjustment, etc.');
            $table->string('reference')->nullable();
            $table->string('article_code');
            $table->integer('quantity');
            $table->foreignIdFor(Site::class);
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Article::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movements');
    }
};
