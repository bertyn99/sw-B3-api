<?php

namespace Database\Factories;

use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

class VehicleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vehicle::class;

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
            'vehicle_class' => Str::random(10),
            'manufactor' => Str::random(10),
            'lenght' => Str::random(10),
            'cost_in_credit' => Str::random(10),
            'crew' => Str::random(10),
            'passenger' => Str::random(10),
            'max_atmosphere' => Str::random(10),
            'cargo_capacity' => Str::random(10),
            'consumables' => Str::random(10),
            'url' => "http://localhost:8000/vehicles/".$forcedID,
        ];
    }
}
