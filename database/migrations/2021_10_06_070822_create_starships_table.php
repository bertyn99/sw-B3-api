<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStarshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('starships', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('name');
            $table->string('model');
            $table->string('starship_class');
            $table->string('manufacturer');
            $table->string('cost_in_credits');
            $table->string('length');
            $table->string('crew');
            $table->string('passengers');
            $table->string('max_atmosphering_speed');
            $table->string('hyperdrive_rating');
            $table->string('MGLT');
            $table->string('cargo_capacity');
            $table->string('consumables');

            //$table->bigInteger('films');
            //$table->bigInteger('pilots');

            $table->string('url');
            
            //$table->string('created');
            //$table->string('edited');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('starships');
    }
}
