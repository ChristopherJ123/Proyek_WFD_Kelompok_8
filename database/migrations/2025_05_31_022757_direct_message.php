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
        Schema::create('direct_message', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sender_id')->constrained('user')->onDelete('cascade');
            $table->foreignId('target_user_id')->constrained('user')->onDelete('cascade');
            $table->string('message');
            $table->string('reason')->nullable();
            $table->boolean('is_read')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('direct_message');
    }
};