<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Experience;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Experience>
 */
final class ExperienceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startDate = fake()->dateTimeBetween('-10 years', '-1 year');

        return [
            'title' => fake()->jobTitle(),
            'company_name' => fake()->company(),
            'company_website' => fake()->url(),
            'description' => fake()->paragraph(3),
            'start_date' => $startDate,
            'end_date' => fake()->dateTimeBetween($startDate),
        ];
    }

    public function current(): static
    {
        return $this->state(fn (array $attributes) => [
            'end_date' => null,
        ]);
    }
}
