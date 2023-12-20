<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Poll>
 */
class PollFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_poll' => fake()->randomNumber(5, true),
            'created_by' => fake()->numberBetween(1, 10),
            'statement' => fake()->sentence(5),
            'waktu_selesai' => fake()->dateTimeBetween('now', '+1 hours'),
            'created_by' => fake()->numberBetween(1, 10),
        ];
    }
}
