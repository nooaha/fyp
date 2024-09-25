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
        Schema::create('milestone_questions', function (Blueprint $table) { // plural table name
            $table->id();
            $table->unsignedBigInteger('milestone_checklist_id');
            $table->foreign('milestone_checklist_id')->references('id')->on('milestone_checklists')->onDelete('cascade');
            $table->text('question');
            $table->timestamps();        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
