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
        if (!Schema::hasTable('reference_data')) {
            Schema::create('reference_data', function (Blueprint $table) {
                $table->id();
                $table->integer('age_months')->comment('Age in months');
                $table->float('height_normal_3SD')->comment('Normal height for +3SD');
                $table->float('height_normal_0SD')->comment('Normal height for +0SD');
                $table->float('height_min')->comment('Min height');
                $table->float('weight_obese_3SD')->comment('Obese weight for +3SD');
                $table->float('weight_normal_0SD')->comment('Normal weight for +0SD');
                $table->float('weight_min')->comment('Min weight');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reference_data');
    }
};
