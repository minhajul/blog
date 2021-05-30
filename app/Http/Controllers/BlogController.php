<?php

namespace App\Http\Controllers;

use App\Models\Blog;

class BlogController extends Controller
{
    public function show(Blog $blog)
    {
        $blog->increment('hit_count');

        return view('show', compact('blog'));
    }
}
