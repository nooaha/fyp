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
        if (!Schema::hasTable('ref_growth')) {
            Schema::create('ref_growth', function (Blueprint $table) {
                $table->id();
                $table->integer('age_months')->comment('Age in months');
                $table->string('gender');
                $table->float('height_neg_3SD');
                $table->float('height_neg_2SD');
                $table->float('height_normal_0SD');
                $table->float('height_2SD');
                $table->float('height_3SD');

                $table->float('weight_neg_3SD');
                $table->float('weight_neg_2SD');
                $table->float('weight_normal_0SD');
                $table->float('weight_2SD');
                $table->float('weight_3SD');

                $table->timestamps();

                $table->index('age_months');
                $table->index('gender');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ref_growth');
    }
};
