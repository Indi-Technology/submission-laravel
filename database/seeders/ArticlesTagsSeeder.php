<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticlesTagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('articles_tags')->insert([
            [
                'id_articles' => 1,
                'id_tags' => 1
            ],
            [
                'id_articles' => 1,
                'id_tags' => 3
            ],
            [
                'id_articles' => 2,
                'id_tags' => 3
            ],
            [
                'id_articles' => 3,
                'id_tags' => 4
            ],
            [
                'id_articles' => 3,
                'id_tags' => 5
            ],
            [
                'id_articles' => 4,
                'id_tags' => 2
            ],
            [
                'id_articles' => 5,
                'id_tags' => 4
            ],
            [
                'id_articles' => 5,
                'id_tags' => 5
            ],
            [
                'id_articles' => 5,
                'id_tags' => 6
            ],
        ]);
    }
}
