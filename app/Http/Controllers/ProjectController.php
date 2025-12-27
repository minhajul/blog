<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Project;

final class ProjectController extends Controller
{
    public function __invoke()
    {
        $projects = Project::query()->latest()->get();

        return view('projects.index', compact('projects'));
    }
}
