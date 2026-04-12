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

        $typewriterText = [
            'Hello, I am Minhaj 👋',
            'A Full Stack Software Engineer!',
            'DevOps Enthusiast!',
        ];

        return view('frontend.about', compact('user', 'typewriterText', 'skills'));
    }

    public function getSkills()
    {
        return [
            [
                'title' => 'Frontend',
                'description' => 'Interfaces that feel fast, fluid, and accessible',
                'gradient' => 'from-indigo-500/90 to-fuchsia-500/90',
                'technologies' => [
                    ['name' => 'React', 'colorCode' => 'text-indigo-700 bg-indigo-100 dark:text-indigo-300 dark:bg-indigo-500/20'],
                    ['name' => 'Next.js', 'colorCode' => 'text-blue-700 bg-blue-100 dark:text-blue-300 dark:bg-blue-500/20'],
                    ['name' => 'Tailwind CSS', 'colorCode' => 'text-cyan-700 bg-cyan-100 dark:text-cyan-300 dark:bg-cyan-500/20'],
                    ['name' => 'Accessibility', 'colorCode' => 'text-emerald-700 bg-emerald-100 dark:text-emerald-300 dark:bg-emerald-500/20'],
                ],
            ],
            [
                'title' => 'Backend',
                'description' => 'APIs, services, and business logic',
                'gradient' => 'from-blue-500/90 to-violet-500/90',
                'technologies' => [
                    ['name' => 'PHP', 'colorCode' => 'text-amber-700 bg-amber-100 dark:text-amber-300 dark:bg-amber-500/20'],
                    ['name' => 'Laravel', 'colorCode' => 'text-violet-700 bg-violet-100 dark:text-violet-300 dark:bg-violet-500/20'],
                    ['name' => 'Python', 'colorCode' => 'text-rose-700 bg-rose-100 dark:text-rose-300 dark:bg-rose-500/20'],
                    ['name' => 'Node.js', 'colorCode' => 'text-blue-700 bg-blue-100 dark:text-blue-300 dark:bg-blue-500/20'],
                    ['name' => 'Express', 'colorCode' => 'text-indigo-700 bg-indigo-100 dark:text-indigo-300 dark:bg-indigo-500/20'],
                    ['name' => 'Golang', 'colorCode' => 'text-emerald-700 bg-emerald-100 dark:text-emerald-300 dark:bg-emerald-500/20'],
                ],
            ],
            [
                'title' => 'DevOps',
                'description' => 'Automation, CI/CD, and reliability',
                'gradient' => 'from-cyan-500/90 to-blue-600/90',
                'technologies' => [
                    ['name' => 'Docker', 'colorCode' => 'text-cyan-700 bg-cyan-100 dark:text-cyan-300 dark:bg-cyan-500/20'],
                    ['name' => 'Kubernetes', 'colorCode' => 'text-blue-700 bg-blue-100 dark:text-blue-300 dark:bg-blue-500/20'],
                    ['name' => 'Terraform', 'colorCode' => 'text-slate-700 bg-slate-100 dark:text-slate-300 dark:bg-slate-500/20'],
                    ['name' => 'Pulumi', 'colorCode' => 'text-purple-700 bg-purple-100 dark:text-purple-300 dark:bg-purple-500/20'],
                    ['name' => 'GitHub Actions', 'colorCode' => 'text-rose-700 bg-rose-100 dark:text-rose-300 dark:bg-rose-500/20'],
                ],
            ],
            [
                'title' => 'Databases',
                'description' => 'Query design, optimization, and caching',
                'gradient' => 'bg-gradient-to-br from-emerald-500/90',
                'technologies' => [
                    ['name' => 'MySQL', 'colorCode' => 'text-blue-700 bg-blue-100 dark:text-blue-300 dark:bg-blue-500/20'],
                    ['name' => 'PostgreSQL', 'colorCode' => 'text-emerald-700 bg-emerald-100 dark:text-emerald-300 dark:bg-emerald-500/20'],
                ],
            ],
            [
                'title' => 'Cloud',
                'description' => 'Scalable infrastructure and services',
                'gradient' => 'from-sky-500/90 to-indigo-500/90',
                'technologies' => [
                    ['name' => 'AWS', 'colorCode' => 'text-amber-700 bg-amber-100 dark:text-amber-300 dark:bg-amber-500/20'],
                ],
            ],
        ];
    }
}
