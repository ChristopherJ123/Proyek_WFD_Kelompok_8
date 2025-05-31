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
        Schema::create('user_post_report', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->constrained('post')->onDelete('cascade');
            $table->foreignId('post_comment_id')->nullable()->constrained('post_comment')->onDelete('cascade');
            $table->string('report_reason');
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