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
        Schema::create('post_comment', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->constrained('post')->onDelete('cascade');
            $table->foreignId('author_id')->constrained('user')->onDelete('cascade');
            $table->foreignId('parent_message_id')->constrained('post_comment')->onDelete('cascade');
            $table->string('message');
            $table->boolean('is_answer')->default(false);
            $table->boolean('is_post_owner_read')->default(false);
            $table->boolean('is_post_comment_owner')->default(false);
            $table->boolean('is_parent_message')->default(false);
            $table->integer('share_count')->default(0);
            $table->boolean('is_deleted')->default(false);
            $table->string('moderator_notice')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        
    }
};