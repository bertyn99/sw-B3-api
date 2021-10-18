<?php

namespace Database\Factories;

use App\Models\Film;
use Illuminate\Database\Eloquent\Factories\Factory;

class FilmFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Film::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $forcedID = $this->faker->unique()->randomDigitNotNull;

        return [
            //
            'id' => $forcedID,
            'title' => $this->faker->unique()->word(),
            'episode_id' => numerify('#'),
            'opening_crawl' => Str::random(10),
            'director' => Str::random(10),
            'producer' => Str::random(10),
            'release_date' => Carbon\Carbon::now(),
            'url' => "http://localhost:8000/starships/".$forcedID,
        ];
    }
}
