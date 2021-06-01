<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UpdateProfile extends Component
{
    public $user;

    protected $rules = [
        'user.name' => 'required|string|min:2'
    ];

    public function mount()
    {
        $this->user = auth()->user();
    }

    public function save()
    {
        $this->validate();

        $this->user->update([
            'name' => $this->user->name,
        ]);

        session()->flash('success', 'Profile updated.');
    }

    public function render()
    {
        return view('livewire.update-profile');
    }
}
