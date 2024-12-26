<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('mchat_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('child_id')->references('id')->on('children')->onDelete('cascade');
            $table->foreignId('question_id')->constrained('mchat_questions')->onDelete('cascade');
            $table->boolean('answer'); // Yes (1) or No (0)
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mchat_answers');
    }
};
