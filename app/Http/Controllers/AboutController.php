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
                    ['name' => 'React', 'colorCode' => 'text-indigo-300 bg-indigo-500/10 ring-indigo-500/20'],
                    ['name' => 'Next.js', 'colorCode' => 'text-blue-300 bg-blue-500/10 ring-blue-500/20'],
                    ['name' => 'Tailwind CSS', 'colorCode' => 'text-cyan-300 bg-cyan-500/10 ring-cyan-500/20'],
                    ['name' => 'Accessibility', 'colorCode' => 'text-emerald-300 bg-emerald-500/10 ring-emerald-500/20'],
                ],
            ],
            [
                'title' => 'Backend',
                'description' => 'APIs, services, and business logic',
                'gradient' => 'from-blue-500/90 to-violet-500/90',
                'technologies' => [
                    ['name' => 'PHP', 'colorCode' => 'text-amber-300 bg-amber-500 ring-amber-500/20'],
                    ['name' => 'Laravel', 'colorCode' => 'text-violet-300 bg-violet-500/10 ring-violet-500/20'],
                    ['name' => 'Python', 'colorCode' => 'text-rose-300 bg-rose-500/10 ring-rose-500/20'],
                    ['name' => 'Node.js', 'colorCode' => 'text-blue-300 bg-blue-500/10 ring-blue-500/20'],
                    ['name' => 'Express', 'colorCode' => 'text-indigo-300 bg-indigo-500/10 ring-indigo-500/20'],
                    ['name' => 'Golang', 'colorCode' => 'text-emerald-300 bg-emerald-500/10 ring-emerald-500/20'],
                ],
            ],
            [
                'title' => 'DevOps',
                'description' => 'Automation, CI/CD, and reliability',
                'gradient' => 'from-cyan-500/90 to-blue-600/90',
                'technologies' => [
                    ['name' => 'Docker', 'colorCode' => 'text-cyan-300 bg-cyan-500/10 ring-cyan-500/20'],
                    ['name' => 'Kubernetes', 'colorCode' => 'text-blue-300 bg-blue-500/10 ring-blue-500/20'],
                    ['name' => 'Terraform', 'colorCode' => 'text-slate-300 bg-slate-500/10 ring-slate-500/20'],
                    ['name' => 'Pulumi', 'colorCode' => 'text-purple-300 bg-purple-500/10 ring-purple-500/20'],
                    ['name' => 'GitHub Actions', 'colorCode' => 'text-rose-300 bg-rose-500/10 ring-rose-500/20'],
                ],
            ],
            [
                'title' => 'Databases',
                'description' => 'Query design, optimization, and caching',
                'gradient' => 'bg-gradient-to-br from-emerald-500/90',
                'technologies' => [
                    ['name' => 'MySQL', 'colorCode' => 'text-blue-300 bg-blue-500/10 ring-blue-500/20'],
                    ['name' => 'PostgreSQL', 'colorCode' => 'text-emerald-300 bg-emerald-500/10 ring-emerald-500/20'],
                ],
            ],
            [
                'title' => 'Cloud',
                'description' => 'Scalable infrastructure and services',
                'gradient' => 'from-sky-500/90 to-indigo-500/90',
                'technologies' => [
                    ['name' => 'AWS', 'colorCode' => 'text-amber-300 bg-amber-500 ring-amber-500/20'],
                ],
            ],
        ];
    }
}
