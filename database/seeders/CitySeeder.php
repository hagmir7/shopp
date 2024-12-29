<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            ['name' => 'Casablanca', 'country_id' => 5],
            ['name' => 'Rabat', 'country_id' => 5],
            ['name' => 'Marrakech', 'country_id' => 5],
            ['name' => 'Fes', 'country_id' => 5],
            ['name' => 'Tangier', 'country_id' => 5],
            ['name' => 'Agadir', 'country_id' => 5],
            ['name' => 'Oujda', 'country_id' => 5],
            ['name' => 'Tetouan', 'country_id' => 5],
            ['name' => 'Safi', 'country_id' => 5],
            ['name' => 'El Jadida', 'country_id' => 5],
            ['name' => 'Nador', 'country_id' => 5],
            ['name' => 'Kenitra', 'country_id' => 5],
            ['name' => 'Taza', 'country_id' => 5],
            ['name' => 'Settat', 'country_id' => 5],
            ['name' => 'Laayoune', 'country_id' => 5],
            ['name' => 'Khouribga', 'country_id' => 5],
            ['name' => 'Beni Mellal', 'country_id' => 5],
            ['name' => 'Mohammedia', 'country_id' => 5],
            ['name' => 'Khemisset', 'country_id' => 5],
            ['name' => 'Essaouira', 'country_id' => 5],
        ];

        foreach($cities as $city) {
            City::create($city);
        }
    }
}
