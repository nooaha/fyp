<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('child_milestone_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('child_id')->references('id')->on('children')->onDelete('cascade');
            $table->foreignId('milestone_id')->references('id')->on('milestone_checklists')->onDelete('cascade');
            $table->foreignId('question_id')->references('id')->on('milestone_questions')->onDelete('cascade');
            $table->boolean('completed')->default(false); // Tracks if the milestone is achieved
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('child_milestone_record');
    }
};
