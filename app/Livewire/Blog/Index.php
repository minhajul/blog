<?php

declare(strict_types=1);

namespace App\Livewire\Blog;

use App\Models\Blog;
use Livewire\Component;
use Livewire\WithPagination;

final class Index extends Component
{
    use WithPagination;

    public $viewStyle = 'grid';

    public $keywords = '';

    public $perPage = 9;

    public function loadMore()
    {
        $this->perPage = $this->perPage + 9;
    }

    public function mount($viewStyle)
    {
        $this->viewStyle = $viewStyle;
    }

    public function render()
    {
        $blogs = $this->getFilteredBlogs();

        return view('livewire.blog.index')->with([
            'blogs' => $blogs,
        ]);
    }

    private function getFilteredBlogs()
    {
        $keywords = $this->keywords;

        return Blog::query()
            ->when($keywords, fn ($query) => $query->whereLikes(['title', 'status', 'details'], $keywords))
            ->published()
            ->orderByDesc('updated_at')
            ->paginate($this->perPage);
    }
}
