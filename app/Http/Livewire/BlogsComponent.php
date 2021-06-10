<?php

namespace App\Http\Livewire;

use App\Models\Blog;
use Livewire\Component;
use Livewire\WithPagination;

class BlogsComponent extends Component
{
    use WithPagination;

    public string $keywords = '';

    public function render()
    {
        $keywords = $this->keywords;

        $blogs = Blog::when($keywords, function ($query) use ($keywords) {
            return $query->whereLike(['title'], $keywords);
        })->published()
            ->orderByDesc('created_at')
            ->paginate(10);

        return view('livewire.blogs-component')->with([
            'blogs' => $blogs
        ]);
    }
}
