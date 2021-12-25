<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Team;
use App\Models\Guitar;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;
use Faker;

class GuitarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'brand' => $this->faker->company(),
            'price' => $this->faker->numberbetween(5000, 100000),
        ];
    }
}
