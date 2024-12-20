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
        Schema::create('growth_records', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('child_id');
            $table->double('height', 8, 2)->nullable();
            $table->double('weight', 8, 2)->nullable();
            $table->date('recorded_at')->nullable();
            $table->timestamps();

            $table->foreign('child_id')->references('id')->on('children')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('growth_records');
    }

};
