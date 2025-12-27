<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->unique()->sentence(3),
            'url' => fake()->optional()->url(),
            'technologies' => fake()->randomElements([
                'Laravel',
                'PHP',
                'MySQL',
                'PostgreSQL',
                'Redis',
                'Docker',
                'Kubernetes',
                'AWS',
                'Tailwind CSS',
                'React',
                'Next.js',
            ], rand(2, 5)),
            'description' => fake()->paragraphs(3, true)
        ];
    }
}
