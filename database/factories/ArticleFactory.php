<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::query()->inRandomOrder()->first();


        return [
            'title' => fake()->text(30),
            'image'=> fake()->imageUrl(),
            'content'=> fake()->text(500),
            'sarlavha_haqida' => fake()->text(200),
            'user_id'=> $user,
        ];
    }
}
