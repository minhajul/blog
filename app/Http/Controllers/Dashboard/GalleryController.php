<?php

declare(strict_types=1);

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

final class GalleryController extends Controller
{
    public function index(): View
    {
        $galleries = Gallery::orderByDesc('created_at')->paginate(20);

        return view('dashboard.gallery.index', compact('galleries'));
    }

    public function create(): View
    {
        return view('dashboard.gallery.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'image' => 'required|image',
        ]);

        $fileName = Str::random(5).'.'.$request->file('image')->extension();
        $imagePath = $request->file('image')->storeAs('gallery', $fileName);

        Gallery::create([
            'image_path' => $imagePath,
        ]);

        session()->flash('success', 'You have added new image to the gallery.');

        return redirect()->back();
    }

    public function destroy(Gallery $gallery): RedirectResponse
    {
        $gallery->delete();

        session()->flash('success', 'You have deleted gallery.');

        return redirect()->back();
    }
}
