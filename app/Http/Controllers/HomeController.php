<?php

namespace App\Http\Controllers;

use App\Models\Blog;

class HomeController extends Controller
{
    public function index()
    {
        if ($slug = request('slug')) {
            $blog = Blog::whereSlug($slug)->firstOrFail();

            $blog->increment('hit_count');

            return view('show', compact('blog'));
        }

        return view('home');
    }
}
