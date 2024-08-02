<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Contact;
use Illuminate\View\View;

class InfoController extends Controller
{
    public function index(): View
    {
        $user = auth()->user();

        $analytics = $this->getAnalytics();

        return view('profile.index', compact('user', 'analytics'));
    }

    public function contacts(): View
    {
        $contacts = Contact::query()->paginate(20);

        return view('profile.contact.index', compact('contacts'));
    }

    protected function getAnalytics(): array
    {
        $blogStatistics = Blog::selectRaw('
                COUNT(*) as total_blogs,
                SUM(case when status = "published" then 1 else 0 end) as published_blogs,
                SUM(hit_count) as total_hits')
            ->first();

        return [
            'posted_blog' => $blogStatistics->total_blogs,
            'total_hit_count' => $blogStatistics->total_hits,
            'total_published_blog' => $blogStatistics->published_blogs,
        ];
    }
}
