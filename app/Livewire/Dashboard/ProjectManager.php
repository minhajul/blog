<?php

declare(strict_types=1);

namespace App\Livewire\Dashboard;

use App\Livewire\Forms\ProjectForm;
use App\Models\Project;
use Flux\Flux;
use Livewire\Component;
use Livewire\WithPagination;

final class ProjectManager extends Component
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
        $this->form->reset();

        Flux::modal('project-modal')->show();
    }

    public function edit(Project $project)
    {
        $this->form->setProject($project);

        Flux::modal('project-modal')->show();
    }

    public function save()
    {
        $this->form->save();

        $this->dispatch(
            'show-message',
            message: $this->form->project ? 'Project updated.' : 'Project created.',
            type: 'success'
        );

        Flux::modals()->close();

        $this->loadProjects();
    }

    public function render()
    {
        return view('livewire.dashboard.project-manager');
    }
}
