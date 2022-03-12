<?php

namespace App\Http\Controllers\Profile;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::orderByDesc('created_at')->paginate(20);

        return view('profile.gallery.index', compact('galleries'));
    }

    public function create()
    {
        return view('profile.gallery.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image'
        ]);

        $fileName = Str::random(5) . '.' . $request->file('image')->extension();
        $imagePath = $request->file('image')->storeAs('gallery', $fileName);

        Gallery::create([
            'image_path' => $imagePath
        ]);

        session()->flash('success', 'You have added new image to the gallery.');
        return redirect()->back();
    }

    public function show(Gallery $gallery)
    {
        return $gallery;
    }

    public function update(Request $request, Gallery $gallery)
    {
        $this->validate($request, [
            'image' => 'required|image'
        ]);

        $fileName = Str::random(5) . '.' . $request->file('image')->extension();
        $imagePath = $request->file('image')->storeAs('gallery', $fileName);

        $gallery->update([
            'image_path' => $imagePath
        ]);
    }

    public function destroy(Gallery $gallery)
    {
        $gallery->delete();

        session()->flash('success', 'You have deleted gallery.');
        return redirect()->back();
    }
}
