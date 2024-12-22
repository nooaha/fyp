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
        Schema::create('mchat_questions', function (Blueprint $table) {
            $table->id();
            $table->string('question');
            $table->boolean('is_critical')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mchat_questions');
    }

};