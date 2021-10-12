<?php

namespace Database\Factories;

use App\Models\Specie;
use Illuminate\Database\Eloquent\Factories\Factory;

class SpecieFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Specie::class;

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
            'name' => $this->faker->unique()->name(),
            'classification' => Str::random(10),
            'designation' => Str::random(10),
            'height_average' => Str::random(10),
            'hair_colors' => Str::random(10),
            'eye_colors' => Str::random(10),
            'height' => Str::random(10),
            'average_life' => Str::random(10),
            'language' => Str::random(10),
            'skin_colors' => Str::random(10),
            'url' => "http://localhost:8000/species/".$forcedID,
        ];
    }
}
