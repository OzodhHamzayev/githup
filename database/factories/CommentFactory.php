<?php

namespace Database\Factories;
use App\Models\Article;
use App\Models\User;
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
        $user = User::query()->inRandomOrder()->first();
        $article = Article::query()->inRandomOrder()->first();
        return [
            'comment' => fake()->text(100),
            'user_id'=> $user,
            'article_id'=> $article,
        ];
    }
}
