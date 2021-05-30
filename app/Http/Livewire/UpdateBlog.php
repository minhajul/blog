<?php

namespace App\Http\Livewire;

use App\Models\Blog;
use Livewire\Component;

class UpdateBlog extends Component
{
    public Blog $blog;

    protected array $rules = [
        'blog.title' => 'required|string|min:2',
        'blog.details' => 'required|string',
    ];

    public function mount($blog)
    {
        $this->blog = $blog;
    }

    public function update()
    {
        $this->validate();

        $this->blog->save();

        session()->flash('success', 'Blog has been updated!');
        return redirect(route('profile.index'));
    }

    public function render()
    {
        return view('livewire.update-blog');
    }
}
