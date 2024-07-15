<?php

namespace Database\Factories;

use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Room::class;

    public function definition()
    {
        return [
            'name' => 'Room ' . $this->faker->numberBetween(1, 100),
            'description' => $this->faker->paragraph,
            'status' => $this->faker->randomElement([0, 1]), // random status 0 or 1
        ];
    }

    public function configure()
    {
        return $this->afterMaking(function (Room $room) {
            $room->slug = Str::slug($room->name);
        })->afterCreating(function (Room $room) {
            $room->slug = Str::slug($room->name);
            $room->save();
        });
    }
}
