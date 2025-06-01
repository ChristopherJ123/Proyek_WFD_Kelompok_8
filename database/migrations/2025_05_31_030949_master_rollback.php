<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
            // ada 16 table
        Schema::dropIfExists('post_images'); // 1
        Schema::dropIfExists('user_post_reports'); // 2
        Schema::dropIfExists('direct_message_images'); // 3
        Schema::dropIfExists('direct_messages'); // 4
        Schema::dropIfExists('user_topic_following'); // 5
        Schema::dropIfExists('topic_blocked_users'); // 6
        Schema::dropIfExists('topic_rules'); // 7
        Schema::dropIfExists('topic_moderator'); // 8
        Schema::dropIfExists('user_genres'); // 9
        Schema::dropIfExists('user_votes'); // 10
        Schema::dropIfExists('post_comments'); // 11
        Schema::dropIfExists('posts'); // 12
        Schema::dropIfExists('topics'); // 13
        Schema::dropIfExists('genres'); // 14
        Schema::dropIfExists('users'); // 15
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('roles'); // 16
    }
};
