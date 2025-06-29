<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Genre::upsert([
            ['name' => 'Lifestyle'],
            ['name' => 'Entertainment'],
            ['name' => 'Animation'],
            ['name' => 'Education'],
            ['name' => 'News & Politics'],
            ['name' => 'Art & Literature'],
        ], uniqueBy: 'id');
    }
}
