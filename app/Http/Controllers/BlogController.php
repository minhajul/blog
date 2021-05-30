<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function show($blog)
    {
        return view('show', compact('blog'));
    }
}
