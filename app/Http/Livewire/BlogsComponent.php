<?php

namespace App\Http\Livewire;

use App\Models\Blog;
use Livewire\Component;
use Livewire\WithPagination;

class BlogsComponent extends Component
{
    use WithPagination;

    public $viewStyle = 'grid';

    public string $keywords = '';

    public function mount($viewStyle)
    {
        $this->viewStyle = $viewStyle;
    }

    public function render()
    {
        $keywords = $this->keywords;

        $blogs = Blog::when($keywords, function ($query) use ($keywords) {
            return $query->whereLike(['title'], $keywords);
        })->published()
          ->orderByDesc('created_at')
          ->paginate(12);

        return view("livewire.blogs-component-{$this->viewStyle}")->with([
            'blogs' => $blogs
        ]);
    }
}
