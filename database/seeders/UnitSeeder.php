<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $unitTypes = [
            ['name' => 'Weight'], // g, kg...
            ['name' => 'Volume'], // ml, l...
            ['name' => 'Length'], // cm, m...
            ['name' => 'Area'], // m2, km2...
            ['name' => 'Size'], // m, l, lg, xl...
        ];


        foreach ($unitTypes as $unitType) {
            \App\Models\UnitType::create($unitType);
        }


        $units = [
            ["name" => "Gram", 'abbreviation' => 'g', 'unit_type_id' => 1],
            ["name" => "Kilogram", 'abbreviation' => 'kg', 'unit_type_id' => 1],
            ["name" => "Milliliter", 'abbreviation' => 'ml', 'unit_type_id' => 2],
            ["name" => "Liter", 'abbreviation' => 'l', 'unit_type_id' => 2],
            ["name" => "Centimeter", 'abbreviation' => 'cm', 'unit_type_id' => 3],
            ["name" => "Meter", 'abbreviation' => 'm', 'unit_type_id' => 3],
            ["name" => "Square Meter", 'abbreviation' => 'm2', 'unit_type_id' => 4],
            ["name" => "Cubic Meter", 'abbreviation' => 'm3', 'unit_type_id' => 4],
            ["name" => "Small", 'abbreviation' => 'sm', 'unit_type_id' => 5],
            ["name" => "Medium", 'abbreviation' => 'md', 'unit_type_id' => 5],
            ["name" => "Large", 'abbreviation' => 'lg', 'unit_type_id' => 5],
            ["name" => "Extra Large", 'abbreviation' => 'xl', 'unit_type_id' => 5],
        ];

        foreach ($units as $unit) {
            \App\Models\Unit::create($unit);
        }
    }
}
