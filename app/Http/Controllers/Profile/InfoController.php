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
        /**
         * @var object{
         *     total_blogs: int,
         *     published_blogs: int,
         *     total_hits: int
         * } $blogStatistics
         */
        $blogStatistics = Blog::selectRaw('
                COUNT(*) as total_blogs,
                SUM(CASE WHEN status = "published" THEN 1 ELSE 0 END) as published_blogs,
                SUM(hit_count) as total_hits')
            ->first();

        return [
            'posted_blog' => $blogStatistics->total_blogs,
            'total_hit_count' => $blogStatistics->total_hits,
            'total_published_blog' => $blogStatistics->published_blogs,
        ];
    }
}
