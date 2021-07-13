<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Setting;
use App\Models\Subscriber;
use Illuminate\Http\RedirectResponse;

class HomeController extends Controller
{
    public function index()
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

        if (!$subscriber->isVerified()) {
            $subscriber->markAsVerified();
        }

        return redirect()->route('home');
    }

    private function getViewStyle(): string
    {
        $setting = Setting::first();

        if ($setting) {
            return $setting->view;
        }

        return 'grid';
    }
}
