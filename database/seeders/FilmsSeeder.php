<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FilmsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('films')->insert([
            'title' => Str::random(10),
            'episode_id' => numerify('#'),
            'opening_crawl' => Str::random(10),
            'director' => Str::random(10),
            'producer' => Str::random(10),
            'release_date' => Carbon\Carbon::now(),
            'url' => Str::random(10),
        ]);
    }
}
