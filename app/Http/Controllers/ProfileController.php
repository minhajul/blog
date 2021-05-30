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
        return Blog::paginate(30);
    }

    public function show(Blog $blog)
    {
        return $blog;
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
