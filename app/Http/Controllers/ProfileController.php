<?php

namespace App\Http\Controllers;

use App\Models\Blog;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $analytics = $this->getAnalytics();

        return view('profile.index', compact('user', 'analytics'));
    }

    public function blogs()
    {
        $blogs = Blog::paginate(9);

        return view('profile.blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('profile.blogs.create');
    }

    public function show(Blog $blog)
    {
        return view('profile.blogs.update', compact('blog'));
    }

    protected function getAnalytics(): array
    {
        $blogs = Blog::all();

        return [
            'posted_blog' => $blogs->count(),
            'total_hit_count' => $blogs->sum('hit_count'),
            'test' => 10,
        ];
    }
}
