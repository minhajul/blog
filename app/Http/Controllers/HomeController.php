<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Subscriber;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

final class HomeController extends Controller
{
    public function show(Blog $blog): View
    {
        $blog->increment('hit_count');

        return view('show', compact('blog'));
    }

    public function verify($email): RedirectResponse
    {
        $subscriber = Subscriber::whereEmail($email)->firstOrFail();

        if (! $subscriber->isVerified()) {
            $subscriber->markAsVerified();
        }

        return redirect()->route('home');
    }
}
