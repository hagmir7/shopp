<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $languages = [

            [
                'name' => 'English',
                'code' => 'en',
            ],

            [
                'name' => 'العربية',
                'code' => 'en',
            ],

            [
                'name' => 'Français',
                'code' => 'fr',
            ],

            [
                'name' => 'Spanish',
                'code' => 'es',
            ],



        ];


        foreach ($languages as $language) {
            Language::create($language);
        }
    }
}
