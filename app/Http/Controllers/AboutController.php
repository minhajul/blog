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

        return view('about', compact('user'));
    }
}
