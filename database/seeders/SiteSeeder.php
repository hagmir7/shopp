<?php

namespace Database\Seeders;

use App\Models\Site;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sites')->insert([
            [
                'name' => 'Amtar',
                'domain' => 'localhost',
                'title' => 'Amtar - Store Site',
                'favicon' => 'favicon.ico',
                'logo' => 'logo.png',
                'image' => 'site-image.png',
                'tags' => 'example, demo, website',
                'description' => 'This is an example site for demonstration purposes.',
                'email' => 'info@example.com',
                'phone' => '+212 600 000 000',
                'language_id' => 1,
                'country_id' => 5,
                'options' => json_encode([
                    'theme' => 'default',
                    'layout' => 'responsive',
                ]),
                'currency' => 'MAD',
                'currency_code' => 'MAD',
                'header' => '<header>Example Header Content</header>',
                'footer' => '<footer>Example Footer Content</footer>',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
