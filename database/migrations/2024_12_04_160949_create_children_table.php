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
        Schema::create('children', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_id');
            $table->foreign('parent_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('child_name')->nullable();
            $table->date('child_dob')->nullable();
            $table->string('child_gender')->nullable(); 
            $table->decimal('height', 5, 2)->nullable(); // Allows up to 999.99 cm/in
            $table->decimal('weight', 5, 2)->nullable(); // Allows up to 999.99 kg/lbs
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('children');
    }
};