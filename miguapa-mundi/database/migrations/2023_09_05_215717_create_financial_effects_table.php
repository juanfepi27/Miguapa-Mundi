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
        Schema::create('financial_effects', function (Blueprint $table) {
            $table->id();
            $table->integer('financial_effect');
            $table->unsignedBigInteger('news_id');
            $table->foreign('news_id')->references('id')->on('news');
            // foreign for countries is missing at this moment
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('financial_effects');
    }
};
