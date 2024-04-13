<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Diary>
 */
class DiaryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $dataTime = $this->faker->dateTimeBetween('-1 month', 'now');
        return [
            'user_id' => User::factory(),
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraph,
            'image' => $this->faker->imageUrl(),
            'created_at' => $dataTime,
            'updated_at' => $dataTime,
        ];
    }
}
