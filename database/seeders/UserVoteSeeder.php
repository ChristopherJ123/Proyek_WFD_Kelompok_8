<?php

namespace Database\Seeders;

use App\Models\PostComment;
use App\Models\UserVote;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class UserVoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserVote::factory()
            ->count(500)
            ->state(new Sequence(
                fn (Sequence $sequence) => ['post_comment_id' => $sequence->index % 4 === 0 ? PostComment::all()->random() : null]
            ))
            ->create();
    }
}
