<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('a_i_chat_replies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ai_chat_id')->constrained('a_i_chats')->onDelete('cascade');
            $table->text('message');
            $table->boolean('is_ai');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('a_i_chat_replies');
    }
};