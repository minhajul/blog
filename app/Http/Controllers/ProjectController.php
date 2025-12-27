<?php

namespace App\Http\Controllers;

use App\Models\Project;

class ProjectController extends Controller
{
    public function __invoke()
    {
        $projects = Project::query()->latest()->get();

        return view('projects.index', compact('projects'));
    }
}
