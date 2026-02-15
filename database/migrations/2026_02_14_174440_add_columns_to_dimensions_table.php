<?php

use App\Models\Color;
use App\Models\Unit;
use App\Models\UnitType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('dimensions', function (Blueprint $table) {
            $table->foreignIdFor(UnitType::class)->nullable();
            $table->foreignIdFor(Color::class)->nullable();
            $table->foreignIdFor(Unit::class)->nullable()->change();
        });
    }
    public function down(): void
    {
        Schema::table('dimensions', function (Blueprint $table) {
            $table->dropColumn([
                'color_id',
                'unit_type_id'
            ]);
        });
    }
};
