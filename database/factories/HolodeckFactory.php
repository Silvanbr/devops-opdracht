<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Holodeck>
 */
class HolodeckFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "type" => $this->faker->text(5),
            "serial_no" => $this->faker->randomFloat(0, 1, 135),
            "sw_version" => $this->faker->randomFloat(1, 1, 20),
        ];
    }
}
