<?php

namespace Database\Factories;

use App\Models\Planet;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlanetFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Planet::class;

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
            'model' => Str::random(10),
            'diameter' => Str::random(10),
            'rotation_period' => Str::random(10),
            'orbital_period' => Str::random(10),
            'gravity' => Str::random(10),
            'population' => Str::random(10),
            'climate' => Str::random(10),
            'terrain' => Str::random(10),
            'surface_water' => Str::random(10),
            'url' => "http://localhost:8000/planets/".$forcedID,
        ];
    }
}
