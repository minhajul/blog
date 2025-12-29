<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Experience;

final class ExperienceController extends Controller
{
    public function __invoke()
    {
        $experiences = Experience::query()->latest()->get();

        return view('frontend.experiences.index', compact('experiences'));
    }
}
