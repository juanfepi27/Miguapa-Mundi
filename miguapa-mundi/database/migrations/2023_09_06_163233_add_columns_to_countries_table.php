<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToCountriesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('countries', function (Blueprint $table) {
            $table->integer('default_offer_value');
            $table->unsignedBigInteger('user_owner_id');
            $table->foreign('user_owner_id')->references('id')->on('users');
        });
    }

};
