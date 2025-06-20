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
        Schema::table('topic_blocked_users', function (Blueprint $table) {
            $table->foreignId('admin_id')->nullable()->constrained('users')->onDelete('set null');
            $table->dropForeign(['moderator_id']); 
            $table->unsignedBigInteger('moderator_id')->nullable()->change(); 
            $table->foreign('moderator_id')->references('id')->on('topic_moderators')->onDelete('set null'); 
        });
    }

    /**
     * Reverse the migrations.
     */
     public function down(): void
    {
        Schema::table('topic_blocked_users', function (Blueprint $table) {
            $table->dropForeign(['admin_id']);
            $table->dropColumn('admin_id');
            $table->dropForeign(['moderator_id']);
            $table->unsignedBigInteger('moderator_id')->nullable(false)->change(); 
            $table->foreign('moderator_id')->references('id')->on('topic_moderators')->onDelete('cascade');
        });
    }
};
