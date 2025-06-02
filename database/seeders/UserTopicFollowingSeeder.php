<?php

namespace Database\Seeders;

use App\Models\UserTopicFollowing;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTopicFollowingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserTopicFollowing::upsert([
            ['user_id' => 1, 'topic_id' => 1],
            ['user_id' => 1, 'topic_id' => 3],
            ['user_id' => 1, 'topic_id' => 5],
            ['user_id' => 1, 'topic_id' => 7],
            ['user_id' => 1, 'topic_id' => 9],
        ], uniqueBy: 'id');
    }
}
