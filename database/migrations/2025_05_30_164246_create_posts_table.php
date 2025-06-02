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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('author_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('topic_id')->constrained('topics')->onDelete('cascade');
            $table->string('title');
            $table->string('description')->nullable();
            $table->integer('share_count')->default(0);
//            $table->boolean('is_deleted')->default(false); // Menggunakan laravel Soft Delete.
            $table->string('moderator_notice')->nullable();
            $table->softDeletes(); // Soft delete
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
