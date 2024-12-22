<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    // database/migrations/xxxx_xx_xx_create_mchat_results_table.php
    public function up()
    {
        Schema::create('mchat_results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('child_id')->references('id')->on('children')->onDelete('cascade');
            $table->integer('score');
            $table->string('risk_level');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mchat_results');
    }

};
