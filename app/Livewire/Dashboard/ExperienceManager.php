<?php

namespace App\Livewire\Dashboard;

use App\Livewire\Forms\ExperienceForm;
use App\Models\Experience;
use Flux\Flux;
use Livewire\Component;
use Livewire\WithPagination;

class ExperienceManager extends Component
{
    use WithPagination;

    public ExperienceForm $form;

    public $experiences = [];

    public function mount()
    {
        $this->loadExperiences();
    }

    public function loadExperiences()
    {
        $this->experiences = Experience::query()->get();
    }

    public function create()
    {
        $this->form->reset();

        Flux::modal('experience-modal')->show();
    }

    public function edit(Experience $experience)
    {
        $this->form->setExperience($experience);

        Flux::modal('experience-modal')->show();
    }

    public function save()
    {
        $this->form->save();

        $this->dispatch(
            'show-message',
            message: $this->form->experience ? 'Experience updated.' : 'Experience created.',
            type: 'success'
        );

        Flux::modals()->close();

        $this->loadExperiences();
    }

    public function render()
    {
        return view('livewire.dashboard.experience-manager');
    }
}
