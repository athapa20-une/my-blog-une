<?php

namespace Database\Factories;


use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Post::class;

    public function definition(): array
    {
        $userIds = User::pluck('_id')->toArray(); // Adjust '_id' to 'id' if not using MongoDB
        $user_id = $this->faker->randomElement($userIds);

        return [
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraph,
            'user_id' => $user_id, // Randomly assign a user_id
            'status' => $this->faker->numberBetween(0, 1),
        ];
    }
}
