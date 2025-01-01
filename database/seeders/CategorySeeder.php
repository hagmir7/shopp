<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Electronics',
                'image' => 'category1.jpg',
                'description' => 'Category 1 description',
                'site_id' => 1,
                'discount' => 10,
            ],
            [
                'name' => 'Fashion',
                'image' => 'category2.jpg',
                'description' => 'Category 2 description',
                'site_id' => 1,
                'discount' => 20,
            ],
            [
                'name' => 'Home and Living',
                'image' => 'category3.jpg',
                'description' => 'Category 3 description',
                'site_id' => 1,
                'discount' => 30,
            ],


            [
                'name' => 'Beauty',
                'image' => 'category3.jpg',
                'description' => 'Category 3 description',
                'site_id' => 1,
                'discount' => 30,
            ],
            [
                'name' => 'Sports',
                'image' => 'category3.jpg',
                'description' => 'Category 3 description',
                'site_id' => 1,
                'discount' => 30,
            ],

            [
                'name' => 'Books and Media',
                'image' => 'category3.jpg',
                'description' => 'Category 3 description',
                'site_id' => 1,
                'discount' => 30,
            ],
        ];

        foreach ($categories as $category) {
            \App\Models\Category::create($category);
        }

    }
}
