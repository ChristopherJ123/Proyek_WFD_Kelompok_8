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
        Schema::dropIfExists('post_image'); // 1
        Schema::dropIfExists('user_post_report'); // 2
        Schema::dropIfExists('direct_message_image'); // 3
        Schema::dropIfExists('direct_message'); // 4
        Schema::dropIfExists('user_topic_follow'); // 5
        Schema::dropIfExists('topic_blocked_user'); // 6
        Schema::dropIfExists('topic_rule'); // 7
        Schema::dropIfExists('topic_moderator'); // 8
        Schema::dropIfExists('user_genre'); // 9
        Schema::dropIfExists('user_vote'); // 10
        Schema::dropIfExists('post_comment'); // 11
        Schema::dropIfExists('post'); // 12
        Schema::dropIfExists('topic'); // 13
        Schema::dropIfExists('genre'); // 14
        Schema::dropIfExists('user'); // 15
        Schema::dropIfExists('role'); // 16
    }
};