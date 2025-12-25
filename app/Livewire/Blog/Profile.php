<?php

declare(strict_types=1);

namespace App\Livewire\Blog;

use App\Models\Blog;
use Livewire\Component;
use Livewire\WithPagination;

final class Profile extends Component
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
        $blogs = $this->getBlogs();

        return view('livewire.blog.profile')->with([
            'blogs' => $blogs,
        ]);
    }

    protected function getBlogs()
    {
        $keywords = $this->keywords;

        return Blog::when($keywords, function ($query) use ($keywords) {
            return $query->whereLikes(['title', 'status', 'details'], $keywords);
        })->where('status', $this->status)
            ->orderByDesc('updated_at')
            ->paginate(12);
    }
}
