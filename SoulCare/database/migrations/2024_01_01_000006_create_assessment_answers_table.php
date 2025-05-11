<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('assessment_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('assessment_id')->constrained()->onDelete('cascade');
            $table->integer('question_index');
            $table->integer('answer_value');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('assessment_answers');
    }
};