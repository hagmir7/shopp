<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Color::create(['name' => 'Red', 'code' => '#FF0000']);
        Color::create(['name' => 'Green', 'code' => '#00FF00']);
        Color::create(['name' => 'Blue', 'code' => '#0000FF']);
        Color::create(['name' => 'Yellow', 'code' => '#FFFF00']);
        Color::create(['name' => 'Cyan', 'code' => '#00FFFF']);
        Color::create(['name' => 'Magenta', 'code' => '#FF00FF']);
        Color::create(['name' => 'Black', 'code' => '#000000']);
        Color::create(['name' => 'White', 'code' => '#FFFFFF']);
        Color::create(['name' => 'Orange', 'code' => '#FFA500']);
        Color::create(['name' => 'Purple', 'code' => '#800080']);
    }
}
