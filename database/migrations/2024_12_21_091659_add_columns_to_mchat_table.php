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
            if (!Schema::hasColumn('mchat_questions', 'question')) {
                $table->string('question')->nullable();
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
            if (Schema::hasColumn('mchat_questions', 'question')) {
                $table->dropColumn('question');
            }
        });
    }

};
