<?php

namespace App\Http\Livewire;

use App\Models\Blog;
use Livewire\Component;
use Livewire\WithPagination;

class BlogsComponent extends Component
{
    use WithPagination;
    
    public function render()
    {
        $blogs = Blog::paginate(9);

        return view('livewire.blogs-component')->with([
            'blogs' => $blogs
        ]);
    }
}
