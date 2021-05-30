<?php

namespace App\Http\Livewire;

use App\Models\Blog;
use Livewire\Component;

class CreateBlog extends Component
{
    public Blog $blog;

    protected array $rules = [
        'blog.title' => 'required|string|min:2',
        'blog.details' => 'required|string'
    ];

    public function create()
    {
        $validatedData = $this->validate();

        Blog::create($validatedData);

        session()->flash('success', 'Your has been posted!');

        return redirect(route('profile.index'));
    }

    public function render()
    {
        return view('livewire.create-blog');
    }
}
