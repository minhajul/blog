<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Contact;

class InfoController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $analytics = $this->getAnalytics();

        return view('profile.index', compact('user', 'analytics'));
    }

    public function contacts()
    {
        $contacts = Contact::paginate(20);

        return view('profile.contact.index', compact('contacts'));
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
