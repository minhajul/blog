<?php

namespace App\Http\Livewire;

use App\Models\Blog;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateBlog extends Component
{
    use WithFileUploads;

    public $title, $details, $banner;

    protected array $rules = [
        'title' => 'required|string|min:2',
        'banner' => 'max:2048',
        'details' => 'required|string',
    ];

    public function create()
    {
        $this->validate();

        $fileName = Str::random(5) . '.' . $this->banner->extension();
        $bannerPath = $this->banner->storeAs('blog', $fileName);

        Blog::create([
            'title' => $this->title,
            'details' => $this->details,
            'banner_path' => $bannerPath,
        ]);

        session()->flash('success', 'Your has been posted!');

        return redirect(route('profile.index'));
    }

    public function render()
    {
        return view('livewire.create-blog');
    }
}
