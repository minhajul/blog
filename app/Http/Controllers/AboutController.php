<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;

final class AboutController extends Controller
{
    public function __invoke(): View
    {
        $user = User::first();

        $skills = $this->getSkills();

        return view('frontend.about', compact('user', 'skills'));
    }

    /**
     * @return array<int, array{title: string, description: string, icon: string, technologies: array<int, string>}>
     */
    public function getSkills(): array
    {
        return [
            [
                'title' => 'Frontend',
                'description' => 'Interfaces that feel fast, fluid, and accessible',
                'icon' => 'computer-desktop',
                'technologies' => ['React', 'Next.js', 'Tailwind CSS', 'Accessibility'],
            ],
            [
                'title' => 'Backend',
                'description' => 'APIs, services, and business logic',
                'icon' => 'server-stack',
                'technologies' => ['PHP', 'Laravel', 'Python', 'Node.js', 'Express', 'Golang'],
            ],
            [
                'title' => 'DevOps',
                'description' => 'Automation, CI/CD, and reliability',
                'icon' => 'arrow-path',
                'technologies' => ['Docker', 'Kubernetes', 'Terraform', 'Pulumi', 'GitHub Actions'],
            ],
            [
                'title' => 'Databases',
                'description' => 'Query design, optimization, and caching',
                'icon' => 'circle-stack',
                'technologies' => ['MySQL', 'PostgreSQL'],
            ],
            [
                'title' => 'Cloud',
                'description' => 'Scalable infrastructure and services',
                'icon' => 'cloud',
                'technologies' => ['AWS'],
            ],
        ];
    }
}
