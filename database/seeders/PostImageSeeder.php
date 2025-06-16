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
        PostImage::upsert([
            ['post_id' => 1, 'image_link' => 'images/post_images/post_1_1.png'],
            ['post_id' => 1, 'image_link' => 'images/post_images/post_1_2.jpeg'],
            ['post_id' => 2, 'image_link' => 'images/post_images/post_2_1.png'],
            ['post_id' => 4, 'image_link' => 'images/post_images/post_4_1.jpg'],
            ['post_id' => 4, 'image_link' => 'images/post_images/post_4_2.jpeg'],
            ['post_id' => 4, 'image_link' => 'images/post_images/post_4_3.jpg'],
            ['post_id' => 6, 'image_link' => 'images/post_images/post_6_1.jpg'],
            ['post_id' => 8, 'image_link' => 'images/post_images/post_8_1.jpg'],
            ['post_id' => 10, 'image_link' => 'images/post_images/post_10_1.jpg'],
            ['post_id' => 10, 'image_link' => 'images/post_images/post_10_2.jpeg'],
            ['post_id' => 10, 'image_link' => 'images/post_images/post_10_3.webp'],
            ['post_id' => 11, 'image_link' => 'images/post_images/post_11_1.webp'],
            ['post_id' => 12, 'image_link' => 'images/post_images/post_12_1.jpeg'],
            ['post_id' => 14, 'image_link' => 'images/post_images/post_14_1.jpeg'],
            ['post_id' => 17, 'image_link' => 'images/post_images/post_17_1.webp'],
            ['post_id' => 19, 'image_link' => 'images/post_images/post_19_1.jpg'],
            ['post_id' => 20, 'image_link' => 'images/post_images/post_20_1.jpg'],
            ['post_id' => 23, 'image_link' => 'images/post_images/post_23_1.webp'],
            ['post_id' => 25, 'image_link' => 'images/post_images/post_25_1.png'],
            ['post_id' => 25, 'image_link' => 'images/post_images/post_25_2.jpg'],
            ['post_id' => 27, 'image_link' => 'images/post_images/post_27_1.jpg'],
            ['post_id' => 30, 'image_link' => 'images/post_images/post_30_1.jpeg'],
        ], uniqueBy: 'id');

        PostImage::upsert([
            ['post_id' => 2,  'post_comment_id' => 3, 'image_link' => 'images/post_images/post_comment_2_3.png'],
            ['post_id' => 4,  'post_comment_id' => 8, 'image_link' => 'images/post_images/post_comment_4_8.jpg'],
            ['post_id' => 4,  'post_comment_id' => 8, 'image_link' => 'images/post_images/post_comment_4_8_1.jpeg'],
            ['post_id' => 5,  'post_comment_id' => 10, 'image_link' => 'images/post_images/post_comment_5_10.png'],
            ['post_id' => 10, 'post_comment_id' => 19, 'image_link' => 'images/post_images/post_comment_10_19.jpeg'],
            ['post_id' => 11, 'post_comment_id' => 22, 'image_link' => 'images/post_images/post_comment_11_22.jpeg'],
            ['post_id' => 13, 'post_comment_id' => 25, 'image_link' => 'images/post_images/post_comment_13_25.png'],
            ['post_id' => 16, 'post_comment_id' => 31, 'image_link' => 'images/post_images/post_comment_16_31.jpeg'],
            ['post_id' => 18, 'post_comment_id' => 35, 'image_link' => 'images/post_images/post_comment_18_35.jpeg'],
            ['post_id' => 20, 'post_comment_id' => 40, 'image_link' => 'images/post_images/post_comment_20_40.jpeg'],
            ['post_id' => 24, 'post_comment_id' => 47, 'image_link' => 'images/post_images/post_comment_24_47.jpg'],
            ['post_id' => 24, 'post_comment_id' => 47, 'image_link' => 'images/post_images/post_comment_24_47_1.jpg'],
            ['post_id' => 24, 'post_comment_id' => 47, 'image_link' => 'images/post_images/post_comment_24_47_2.jpg'],
            ['post_id' => 26, 'post_comment_id' => 51, 'image_link' => 'images/post_images/post_comment_26_51.jpeg'],
            ['post_id' => 26, 'post_comment_id' => 51, 'image_link' => 'images/post_images/post_comment_26_51_1.jpeg'],
            ['post_id' => 30, 'post_comment_id' => 59, 'image_link' => 'images/post_images/post_comment_30_59.jpg'],
        ], uniqueBy: 'id');

    }
}
