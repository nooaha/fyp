<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tipscategories', function (Blueprint $table) {
            $table->id();
            $table->string('tipscategoryname'); // Name of the category
            $table->string('image')->nullable(); // Image for the category
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tipscategories');
    }
};
