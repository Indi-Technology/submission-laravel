<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Technology',
            'Education',
            'Health',
            'Environment',
            'Business',
            'Arts',
            'Entertainment',
            'Lifestyle',
            'Politics',
            'Sports Science',
            'Travel',
        ];

        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }
    }
}
