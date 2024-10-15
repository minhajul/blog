<?php

namespace App\Livewire\Profile;

use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class Index extends Component
{
    use WithFileUploads;

    public $user;

    public $avatar;

    protected $rules = [
        'user.name' => 'required|string|min:2',
        'user.bio' => 'required|string',
    ];

    public function mount()
    {
        $this->user = auth()->user();
    }

    public function save()
    {
        $this->validate();

        $avatar_url = $this->user->avatar_url;

        if (!is_null($this->avatar)) {
            $file_name = $this->user->name . '-' . Str::random(5) . '.' . $this->avatar->extension();
            $avatar_url = $this->avatar->storeAs('avatar', $file_name);
        }

        $this->user->update([
            'name' => $this->user->name,
            'bio' => $this->user->bio,
            'avatar_url' => $avatar_url,
        ]);

        session()->flash('success', 'Profile updated.');
    }

    public function render()
    {
        return view('livewire.profile.index');
    }
}
