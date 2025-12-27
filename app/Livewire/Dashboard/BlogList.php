<?php

declare(strict_types=1);

namespace App\Livewire\Dashboard;

use App\Enums\BlogStatus;
use App\Models\Blog;
use Livewire\Component;
use Livewire\WithPagination;

final class BlogList extends Component
{
    use WithPagination;

    public $keywords = '';

    public $status = 'published';

    public function filterByStatus($status)
    {
        $this->status = $status;
    }

    public function render()
    {
        $keywords = $this->keywords;

        $blogs = Blog::when($keywords, function ($query) use ($keywords) {
            return $query->whereLikes(['title', 'status', 'details'], $keywords);
        })->where('status', $this->status)
            ->orderByDesc('updated_at')
            ->paginate(12);

        return view('livewire.dashboard.blogs')->with([
            'blogs' => $blogs,
            'statuses' => BlogStatus::cases(),
        ]);
    }
}
