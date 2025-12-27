<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Models\Blog;
use Livewire\Component;
use Livewire\WithPagination;

final class Home extends Component
{
    use WithPagination;

    public $keywords = '';

    public function render()
    {
        $blogs = $this->getFilteredBlogs();

        return view('livewire.home')->with([
            'blogs' => $blogs
        ]);
    }

    private function getFilteredBlogs()
    {
        $keywords = $this->keywords;

        sleep(1);

        return Blog::query()
            ->when($keywords, fn ($query) => $query->whereLikes(['title', 'status', 'details'], $keywords))
            ->published()
            ->orderByDesc('updated_at')
            ->paginate(12);
    }
}
