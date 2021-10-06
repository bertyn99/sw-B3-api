<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpeciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('species', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('classification');
            $table->string('designation');
            $table->string('average');
            $table->string('hair_color');
            $table->string('height_average');
            $table->string('average_life');
            $table->string('eye_colors');
            $table->string('hair_colors');
            $table->string('skin_colors');
            $table->string('language');
            $table->unsignedBigInteger('homeworld');
            $table->foreign('homeworld')->references('id')->on('planets');
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
        Schema::dropIfExists('species');
    }
}
