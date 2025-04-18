<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
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
        return [
            'name'       => $this->faker->sentence(),
            'body'        => $this->faker->paragraph(),
            'author_id'   => $this->faker->numberBetween(1, 10),
            'category_id' => $this->faker->numberBetween(1, 3),
        ];
    }
}
