<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

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

    public function show(Blog $blog)
    {
        $blog->increment('hit_count');

        return view('show', compact('blog'));
    }

    public function upload(Request $request): ?string
    {
        if (!$request->hasFile('file')) {
            return null;
        }

        $fileNameWithExtension = $request->file('file')->getClientOriginalName();

        $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);

        $extension = $request->file('file')->getClientOriginalExtension();

        $fileNameToStore = $fileName . '_' . time() . '.' . $extension;

        $request->file('file')->storeAs('blog/', $fileNameToStore);

        $path = asset('blog/'.$fileNameToStore);

        echo $path;

        exit;
    }
}
