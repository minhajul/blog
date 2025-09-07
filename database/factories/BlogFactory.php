<?php

namespace Database\Factories;

use App\Enums\BlogStatus;
use App\Models\Blog;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Blog::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'status' => $this->faker->randomElement(array_map(fn ($case) => $case->value, BlogStatus::cases())),
            'details' => $this->faker->paragraph(20),
        ];
    }
}
