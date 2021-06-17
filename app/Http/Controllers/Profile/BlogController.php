<?php

namespace App\Http\Controllers\Profile;

use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class BlogController extends Controller
{
    public function index()
    {
        return view('profile.blogs.index');
    }

    public function create()
    {
        return view('profile.blogs.create');
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

        $path = asset('blog/' . $fileNameToStore);

        echo $path;

        exit;
    }

    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'title' => 'required|string|min:2',
            'banner' => 'required|max:2048',
            'details' => 'required|string',
        ]);

        $fileName = Str::random(5) . '.' . $request->banner->extension();
        $bannerPath = $request->banner->storeAs('blog', $fileName);

        Blog::create([
            'title' => $request->title,
            'details' => $request->details,
            'banner_path' => $bannerPath,
        ]);

        session()->flash('success', 'Your has been posted!');
        return redirect()->back();
    }

    public function show(Blog $blog)
    {
        return view('profile.blogs.update', compact('blog'));
    }

    public function update(Request $request, Blog $blog): RedirectResponse
    {
        $this->validate($request, [
            'title' => 'required|string|min:2',
            'details' => 'required|string',
        ]);

        if ($request->input('banner')) {
            $fileName = Str::random(5) . '.' . $request->banner->extension();
            $bannerPath = $request->banner->storeAs('blog', $fileName);

            $blog->banner = $bannerPath;
        }

        $blog->title = $request->input('title');
        $blog->details = $request->input('details');
        $blog->save();

        session()->flash('success', 'Your has been updated!');
        return redirect()->back();
    }
}
