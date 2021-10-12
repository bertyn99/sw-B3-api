<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StarshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('starships')->insert([
            'name' => Str::random(10),
            'model' => Str::random(10),
            'manufacturer' => Str::random(10),
            'cost_in_credits' => Str::random(10),
            'length' => Str::random(10),
            'crew' => Str::random(10),
            'passengers' => Str::random(10),
            'max_atmosphering_speed' => Str::random(10),
            'hyperdrive_rating' => Str::random(10),
            'MGLT' => Str::random(10),
            'cargo_capacity' => Str::random(10),
            'consumables' => Str::random(10),
            'url' => Str::random(10),
        ]);
    }
}
