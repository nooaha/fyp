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
        Schema::create('tips_content', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tips_category_id');
            $table->foreign('tips_category_id')->references('id')->on('tips')->onDelete('cascade');
            $table->string('tips_content');
            $table->string('image'); // Image for the category
            $table->timestamps();
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tips_contents');
    }
};
