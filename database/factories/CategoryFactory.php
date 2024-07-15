<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Category::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->paragraph,
            'status' => $this->faker->randomElement([0, 1]), // random status 0 or 1
        ];
    }

    public function configure()
    {
        return $this->afterMaking(function (Category $category) {
            $category->slug = Str::slug($category->name);
        })->afterCreating(function (Category $category) {
            $category->slug = Str::slug($category->name);
            $category->save();
        });
    }
}
