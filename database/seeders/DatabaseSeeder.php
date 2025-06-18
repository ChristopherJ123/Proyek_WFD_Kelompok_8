<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            GenreSeeder::class,
            TopicSeeder::class,
            TopicRuleSeeder::class,
            PostSeeder::class,
            PostCommentSeeder::class,
            PostImageSeeder::class,
            UserVoteSeeder::class,
            UserTopicFollowingSeeder::class,
        ]);
    }
}
