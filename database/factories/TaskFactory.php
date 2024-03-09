<?php

namespace Database\Factories;

use App\Constants\TaskStatuses;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->name(20),
            'status' => TaskStatuses::getRandom(),
            'user_id' => User::inRandomOrder()->first()->id,
            'created_at' => fake()->dateTimeBetween(now()->subWeeks(2), now()),
            'updated_at' => fake()->dateTimeBetween(now()->subWeeks(2), now())
        ];
    }
}
