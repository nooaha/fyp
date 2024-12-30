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
        Schema::table('mchat_questions', function (Blueprint $table) {
            //
            if (!Schema::hasColumn('mchat_questions', 'mchat_questions')) {
                $table->boolean('expected_answer')->default(false);
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mchat_questions', function (Blueprint $table) {
            //
            if (Schema::hasColumn('mchat_questions', 'mchat_questions')) {
                $table->dropColumn('expected_answer');
            }
        });
    }
};
