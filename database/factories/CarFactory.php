<?php

namespace Database\Factories;

use App\Models\CarModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'color' => $this->faker->safeHexColor(),
            'year' => $this->faker->year(),
            'top_speed' => $this->faker->randomElement([160, 180, 200, 220, 240]),
            'has_gas_economy' => $this->faker->boolean(),
            'car_model_id' => CarModel::query()->inRandomOrder()->first()->id,
        ];
    }
}
