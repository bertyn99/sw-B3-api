<?php

namespace Database\Factories;

use App\Models\People;
use Illuminate\Database\Eloquent\Factories\Factory;

class PeopleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = People::class;

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
            'birth_year' => Str::random(10),
            'eye_color' => Str::random(10),
            'hair_color' => Str::random(10),
            'height' => Str::random(10),
            'mass' => Str::random(10),
            'skin_color' => Str::random(10),
            'url' => "http://localhost:8000/peoples/".$forcedID,
        ];
    }
}
