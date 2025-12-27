<?php

namespace App\Livewire\Dashboard;

use App\Livewire\Forms\ProjectForm;
use App\Models\Project;
use Flux\Flux;
use Livewire\Component;
use Livewire\WithPagination;

class Projects extends Component
{
    use WithPagination;

    public ProjectForm $form;

    public $projects = [];

    public function mount()
    {
        $this->loadProjects();
    }

    public function loadProjects()
    {
        $this->projects = Project::query()->get();
    }

    public function create()
    {
        $this->form->save();

        Flux::modals()->close();

        $this->dispatch('show-message', message: 'Project has been created.', type: 'success');

        $this->loadProjects();
    }

    public function render()
    {
        return view('livewire.dashboard.projects');
    }
}
