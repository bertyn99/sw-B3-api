<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PeopleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('peoples')->insert([
            'name' => Str::random(10),
            'birth_year' => Str::random(10),
            'eye_color' => Str::random(10),
            'hair_color' => Str::random(10),
            'height' => Str::random(10),
            'mass' => Str::random(10),
            'skin_color' => Str::random(10),
            'url' => Str::random(10),
        ]);
    }
}
