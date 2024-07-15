<?php

namespace Database\Factories;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $start = Carbon::createFromTime(0, 30);
        $end = Carbon::createFromTime(2, 0);
        $randomDuration = $this->faker->dateTimeBetween($start, $end);
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'thumbnail' => $this->faker->imageUrl(640, 480, 'movies', true),
            'duration' => $randomDuration->format('H:i:s'),
            'release_date' => $this->faker->date,
            'status' => $this->faker->randomElement([0, 1]),
        ];
    }
    public function configure()
    {
        return $this->afterMaking(function (Movie $movie) {
            $movie->slug = Str::slug($movie->title);
        })->afterCreating(function (Movie $movie) {
            $movie->slug = Str::slug($movie->title);
            $movie->save();
        });
    }
}
