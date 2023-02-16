<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Gallery;
use App\Models\Setting;
use App\Models\Subscriber;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        if ($slug = request('slug')) {
            $blog = Blog::whereSlug($slug)->firstOrFail();

            $blog->increment('hit_count');

            return view('show', compact('blog'));
        }

        $viewStyle = $this->getViewStyle();

        return view('home', compact('viewStyle'));
    }

    public function verify($email): RedirectResponse
    {
        $subscriber = Subscriber::whereEmail($email)->firstOrFail();

        if (! $subscriber->isVerified()) {
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

    private function getViewStyle(): string
    {
        if ($setting = Setting::first()) {
            return $setting->view;
        }

        return 'grid';
    }
}
