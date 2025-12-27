<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\View\View;

final class GalleryController extends Controller
{
    public function __invoke(): View
    {
        $galleries = Gallery::orderByDesc('created_at')->paginate(20);

        return view('gallery', compact('galleries'));
    }
}
