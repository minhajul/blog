<?php

namespace App\Livewire\Blog;

use App\Models\Blog;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $viewStyle = 'grid';

    public $keywords = '';

    public $perPage = 3;

    public function loadMore()
    {
        $this->perPage = $this->perPage + 3;
    }

    public function mount($viewStyle)
    {
        $this->viewStyle = $viewStyle;
    }

    public function render()
    {
        $keywords = $this->keywords;

        sleep(1);

        $blogs = Blog::query()
            ->when($keywords, function ($query) use ($keywords) {
                return $query->whereLike(['title', 'status', 'details'], $keywords);
            })
            ->published()
            ->orderByDesc('updated_at')
            ->paginate($this->perPage);

        return view('livewire.blog.index')->with([
            'blogs' => $blogs,
        ]);
    }
}
