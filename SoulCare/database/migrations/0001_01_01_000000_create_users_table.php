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
        Schema::create('social_interactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('person');
            $table->string('interaction_type');
            $table->date('date');
            $table->integer('duration')->nullable();
            $table->integer('comfort_level');
            $table->text('notes')->nullable();
            $table->timestamps();
        });

        Schema::create('consultations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('therapist_name');
            $table->date('date');
            $table->time('time');
            $table->integer('duration')->nullable();
            $table->text('topics')->nullable();
            $table->text('notes')->nullable();
            $table->date('follow_up_date')->nullable();
            $table->string('status');
            $table->timestamps();
        });

        Schema::create('a_i_chats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->text('message');
            $table->string('topic')->nullable();
            $table->timestamps();
        });

        Schema::create('a_i_chat_replies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ai_chat_id')->constrained()->onDelete('cascade');
            $table->text('message');
            $table->boolean('is_ai');
            $table->timestamps();
        });

        Schema::create('assessments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('type');
            $table->integer('score');
            $table->string('interpretation');
            $table->timestamps();
        });

        Schema::create('assessment_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('assessment_id')->constrained()->onDelete('cascade');
            $table->integer('question_index');
            $table->integer('answer_value');
            $table->timestamps();
        });

        Schema::create('emergency_contacts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('relationship');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->text('notes')->nullable();
            $table->boolean('is_primary')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emergency_contacts');
        Schema::dropIfExists('assessment_answers');
        Schema::dropIfExists('assessments');
        Schema::dropIfExists('a_i_chat_replies');
        Schema::dropIfExists('a_i_chats');
        Schema::dropIfExists('consultations');
        Schema::dropIfExists('social_interactions');
    }
};