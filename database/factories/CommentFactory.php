<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'movie_id' => \App\Models\Movie::factory(),
            'content' => $this->faker->paragraph,
            'date' => $this->faker->dateTimeThisYear,
            'rating' => $this->faker->numberBetween(1, 5),
            'status' => $this->faker->randomElement([0, 1]),
        ];
    }
}
