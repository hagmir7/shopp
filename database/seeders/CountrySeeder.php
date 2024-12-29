<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = [
            [
                'name' => 'United States',
                'code' => 'US',
                'flag' => 'us.png',
                'currency' => 'USD',
            ],
            [
                'name' => 'United Kingdom',
                'code' => 'UK',
                'flag' => 'uk.png',
                'currency' => 'GBP',
            ],
            [
                'name' => 'Canada',
                'code' => 'CA',
                'flag' => 'ca.png',
                'currency' => 'CAD',
            ],
            [
                'name' => 'Australia',
                'code' => 'AU',
                'flag' => 'au.png',
                'currency' => 'AUD',
            ],
            [
                'name' => 'Morocco',
                'code' => 'MA',
                'flag' => 'ma.png',
                'currency' => 'MAD',
            ],
            [
                'name' => 'Saudi Arabia',
                'code' => 'SA',
                'flag' => 'sa.png',
                'currency' => 'SAR',
            ],
            [
                'name' => 'United Arab Emirates',
                'code' => 'AE',
                'flag' => 'ae.png',
                'currency' => 'AED',
            ],
            [
                'name' => 'Egypt',
                'code' => 'EG',
                'flag' => 'eg.png',
                'currency' => 'EGP',
            ],
            [
                'name' => 'Qatar',
                'code' => 'QA',
                'flag' => 'qa.png',
                'currency' => 'QAR',
            ]
        ];



        foreach ($countries as $country) {
            \App\Models\Country::create($country);
        }
    }
}
