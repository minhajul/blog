<?php

namespace App\Http\Livewire;

use App\Models\Job;
use Livewire\Component;

class UpdateJobComponent extends Component
{
    public Job $job;

    protected array $rules = [
        'job.title' => 'required|string|min:2',
        'job.type' => 'required|string',
        'job.department' => 'required|string',
        'job.location' => 'required|string',
//        'is_remote' => 'required|boolean',
        'job.closing_on' => 'required|date',
        'job.descriptions' => 'required|string',
    ];

    public function mount($job)
    {
        $this->job = $job;
    }

    public function update()
    {
        $this->validate();

        $this->job->save();

        session()->flash('success', 'Successfully job created!');
        return redirect(route('profile.jobs'));
    }

    public function render()
    {
        return view('livewire.update-job-component');
    }
}
