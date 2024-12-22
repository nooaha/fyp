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
        Schema::table('growth_records', function (Blueprint $table) {
            $table->unsignedBigInteger('child_id')->after('id'); // Add the child_id column

            // Add additional columns
            $table->float('height')->nullable()->after('child_id'); 
            $table->float('weight')->nullable()->after('height'); 
            $table->date('recorded_at')->nullable()->after('weight'); 

            // Define the foreign key relationship
            $table->foreign('child_id')->references('id')->on('children')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('growth_records', function (Blueprint $table) {
            $table->dropForeign(['child_id']); // Drop the foreign key
            $table->dropColumn(['child_id', 'height', 'weight', 'recorded_at']); // Drop columns
        });
    }
};
