<?php

namespace Database\Seeders;

use App\Models\PostImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PostImage::insert([
            ['post_id' => 1, 'image_link' => 'post_1_1.png'],
            ['post_id' => 2, 'image_link' => 'post_2_1.png'],
            ['post_id' => 4, 'image_link' => 'post_4_1.png'],
            ['post_id' => 6, 'image_link' => 'post_6_1.png'],
            ['post_id' => 8, 'image_link' => 'post_8_1.png'],
            ['post_id' => 10, 'image_link' => 'post_10_1.png'],
            ['post_id' => 11, 'image_link' => 'post_11_1.png'],
            ['post_id' => 12, 'image_link' => 'post_12_1.png'],
            ['post_id' => 14, 'image_link' => 'post_14_1.png'],
            ['post_id' => 17, 'image_link' => 'post_17_1.png'],
            ['post_id' => 19, 'image_link' => 'post_19_1.png'],
            ['post_id' => 20, 'image_link' => 'post_20_1.png'],
            ['post_id' => 23, 'image_link' => 'post_23_1.png'],
            ['post_id' => 25, 'image_link' => 'post_25_1.png'],
            ['post_id' => 27, 'image_link' => 'post_27_1.png'],
            ['post_id' => 30, 'image_link' => 'post_30_1.png'],
        ]);

    }
}
