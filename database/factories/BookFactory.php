<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->words(mt_rand(2,4),true),
            'author' => fake()->name(),
            'publisher' => fake()->company(),
            'summary' => fake()->sentence(mt_rand(15,30)),
            'date_of_issue' => fake()->date(),
        ];
    }
}
