<?php

namespace Database\Factories;

use App\Models\Starship;
use Illuminate\Database\Eloquent\Factories\Factory;

class StarshipFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Starship::class;

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
            'url' => "http://localhost:8000/starships/".$forcedID,
        ];
    }
}
