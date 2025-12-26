<?php

declare(strict_types=1);

namespace App\Livewire\Blog;

use App\Models\Blog;
use App\Models\Setting;
use Livewire\Component;
use Livewire\WithPagination;

final class Index extends Component
{
    use WithPagination;

    //    public $viewStyle = 'grid';

    public $keywords = '';

    //    public function mount($viewStyle)
    //    {
    //        $this->viewStyle = $viewStyle;
    //    }

    public function render()
    {
        $blogs = $this->getFilteredBlogs();

        return view('livewire.blog.index')->with([
            'blogs' => $blogs,
            'viewStyle' => $this->getViewStyle(),
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
            ->paginate(10);
    }

    private function getViewStyle(): string
    {
        if ($setting = Setting::first()) {
            return $setting->view;
        }

        return 'grid';
    }
}
