<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Models\Blog;
use Livewire\Component;

final class Dashboard extends Component
{
    public function render()
    {
        $user = auth()->user();

        $analytics = $this->getAnalytics();

        return view('livewire.dashboard.index', compact('user', 'analytics'));
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
