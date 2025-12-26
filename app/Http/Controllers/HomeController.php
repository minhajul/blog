<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Gallery;
use App\Models\Setting;
use App\Models\Subscriber;
use App\Models\User;
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

        if (!$subscriber->isVerified()) {
            $subscriber->markAsVerified();
        }

        return redirect()->route('home');
    }

    public function about(): View
    {
        $user = User::first();

        return view('about', compact('user'));
    }

    public function gallery(): View
    {
        $galleries = Gallery::orderByDesc('created_at')->paginate(20);

        return view('gallery', compact('galleries'));
    }
}
