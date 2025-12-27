<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\View\View;

class GalleryController extends Controller
{
    public function __invoke(): View
    {
        $galleries = Gallery::orderByDesc('created_at')->paginate(20);

        return view('gallery', compact('galleries'));
    }
}
