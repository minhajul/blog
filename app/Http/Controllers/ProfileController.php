<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

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
        return view('profile.blogs.index');
    }

    public function create()
    {
        return view('profile.blogs.create');
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
            'banner' => 'required|max:2048',
            'details' => 'required|string',
        ]);

        $fileName = Str::random(5) . '.' . $request->banner->extension();
        $bannerPath = $request->banner->storeAs('blog', $fileName);

        $blog->update([
            'title' => $request->title,
            'details' => $request->details,
            'banner_path' => $bannerPath,
        ]);

        session()->flash('success', 'Your has been updated!');
        return redirect()->back();
    }

    protected function getAnalytics(): array
    {
        $blogs = Blog::all();

        return [
            'posted_blog' => $blogs->count(),
            'total_hit_count' => $blogs->sum('hit_count'),
            'total_published_blog' => $blogs->where('status', 'published')->count(),
        ];
    }
}
