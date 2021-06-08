<?php

namespace App\Http\Livewire;

use Livewire\Component;

class BioComponent extends Component
{
    public $user;

    protected $rules = [
        'user.bio' => 'required|string'
    ];

    public function mount()
    {
        $this->user = auth()->user();
    }

    public function save()
    {
        $this->validate();

        $this->user->update([
            'bio' => $this->user->bio,
        ]);

        session()->flash('success', 'Added bio successfully.');
    }

    public function render()
    {
        return view('livewire.bio-component');
    }
}
