<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'name' => 'Technology 💻',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Science 🧬',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Health 🩺',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Entertainment 🎭',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sports ⚽',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Business 💼',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Travel 🌎',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Food 🍔',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Education 📚',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Gaming 🎮',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Fashion 🌸',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Music 🎼',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pets 🐶',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'News 📰',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Comedy 🤪',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
