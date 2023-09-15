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
        Schema::table('financial_effects', function (Blueprint $table) {
            $table->renameColumn('financial_effect', 'effect');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('financial_effects', function (Blueprint $table) {
            //$table->renameColumn('effect', 'financial_effect');
        });
    }
};
