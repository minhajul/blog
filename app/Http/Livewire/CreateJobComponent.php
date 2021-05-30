<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CreateJobComponent extends Component
{
    public string $title;
    public string $type;
    public string $department;
    public string $location;
    public string $closing_on;
    public string $descriptions;

    protected array $rules = [
        'title' => 'required|string|min:2',
        'type' => 'required|string',
        'department' => 'required|string',
        'location' => 'required|string',
        'closing_on' => 'required|date',
        'descriptions' => 'required|string',
    ];

    public function createJob()
    {
        $validatedData = $this->validate();

        $user = auth()->user();

        $user->organization->jobs()->create($validatedData);

        session()->flash('success', 'Successfully job created!');
        return redirect(route('profile.jobs'));
    }

    public function render()
    {
        return view('livewire.create-job-component');
    }
}
