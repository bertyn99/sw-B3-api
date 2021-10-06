<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleFilmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people_films', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('people');
            $table->foreign('people')->references('id')->on('peoples');
            $table->unsignedBigInteger('film');
            $table->foreign('film')->references('id')->on('films');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('people_films');
    }
}
