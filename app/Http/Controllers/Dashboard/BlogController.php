<?php

declare(strict_types=1);

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

final class BlogController extends Controller
{
    public function index(): View
    {
        return view('dashboard.blogs.index');
    }

    public function create(): View
    {
        return view('dashboard.blogs.create');
    }

    public function upload(Request $request)
    {
        if (! $request->hasFile('file')) {
            return null;
        }

        $fileNameWithExtension = $request->file('file')->getClientOriginalName();

        $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);

        $extension = $request->file('file')->getClientOriginalExtension();

        $fileNameToStore = $fileName.'_'.time().'.'.$extension;

        $request->file('file')->storeAs('blog/', $fileNameToStore);

        $path = asset('blog/'.$fileNameToStore);

        echo $path;

        exit;
    }

    public function store(BlogRequest $request): RedirectResponse
    {
        $bannerPath = null;

        if ($request->file('banner')) {
            $fileName = Str::random(5).'.'.$request->file('banner')->extension();
            $bannerPath = $request->file('banner')->storeAs('blog', $fileName);
        }

        Blog::create([
            'title' => $request->input('title'),
            'status' => $request->input('status'),
            'details' => $request->input('details'),
            'banner_path' => $bannerPath,
        ]);

        session()->flash('success', 'Your has been posted!');

        return redirect()->back();
    }

    public function show(Blog $blog): View
    {
        return view('dashboard.blogs.update', compact('blog'));
    }

    public function markAsArchived(Blog $blog): RedirectResponse
    {
        $blog->markAsArchived();

        session()->flash('success', 'Your has been posted!');

        return redirect()->back();
    }

    public function update(BlogRequest $request, Blog $blog): RedirectResponse
    {
        if ($request->file('banner')) {
            $fileName = Str::random(5).'.'.$request->file('banner')->extension();
            $bannerPath = $request->file('banner')->storeAs('blog', $fileName);

            $request['banner_path'] = $bannerPath;
        }

        $blog->update($request->all());

        session()->flash('success', 'Your blog has been updated!');

        return redirect()->back();
    }
}
