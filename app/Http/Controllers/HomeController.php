<?php

namespace App\Http\Controllers;

use App\Models\Blog;

class HomeController extends Controller
{
    public function index()
    {
        $blogs = Blog::paginate(9);

        return view('home', compact('blogs'));
    }
}
