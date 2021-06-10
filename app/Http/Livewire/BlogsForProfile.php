<?php

namespace App\Http\Livewire;

use App\Models\Blog;
use Livewire\Component;
use Livewire\WithPagination;

class BlogsForProfile extends Component
{
    use WithPagination;

    public string $keywords = '';

    public string $status = 'published';

    public function filterByStatus($status)
    {
        $this->status = $status;
    }

    public function render()
    {
        $blogs = $this->getBlogs();

        return view('livewire.blogs-for-profile')->with([
            'blogs' => $blogs
        ]);
    }

    protected function getBlogs()
    {
        $keywords = $this->keywords;

        return Blog::when($keywords, function ($query) use ($keywords) {
            return $query->whereLike(['title'], $keywords);
        })->where('status', $this->status)
            ->orderByDesc('created_at')
            ->paginate(10);
    }
}
