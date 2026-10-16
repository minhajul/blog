<x-layouts.dashboard>
    <x-dashboard.heading title="Projects" description="Showcase the things you've built.">
        <x-slot:actions>
            <flux:button wire:click="create" variant="primary" icon="plus">New project</flux:button>
        </x-slot:actions>
    </x-dashboard.heading>

    <div class="mt-6 grid gap-4 sm:grid-cols-2 xl:grid-cols-3">
        @forelse($projects as $project)
            <div class="card flex flex-col p-5">
                <div class="flex items-start justify-between gap-3">
                    <p class="font-semibold leading-snug text-ink">
                        {{ $project->title }}
                    </p>

                    <flux:button
                        wire:click="edit({{ $project->id }})"
                        icon="pencil-square"
                        variant="ghost"
                        size="xs"
                        aria-label="Edit project"
                    />
                </div>

                <p class="mt-2 line-clamp-3 text-sm text-ink-muted">{{ $project->short_description }}</p>

                @if(filled($project->technologies))
                    <ul class="mt-auto flex flex-wrap gap-1.5 pt-4">
                        @foreach($project->technologies as $tech)
                            <li class="chip">{{ $tech }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
        @empty
            <x-empty-state class="col-span-full" icon="folder-open" title="No project added" description="Create your first project to show it on the site." />
        @endforelse
    </div>

    <flux:modal name="project-modal" class="w-full md:w-xl">
        <form wire:submit="save">
            <div class="space-y-6">
                <div>
                    <flux:heading size="lg">{{ $form->project ? 'Edit' : 'Create' }} Project</flux:heading>
                    <flux:text class="mt-2">{{ $form->project ? 'Update existing project details.' : 'Add your next project.' }}</flux:text>
                </div>
                <flux:input label="Title" wire:model="form.title" placeholder="Project title" />

                <flux:input label="URL" wire:model="form.url" placeholder="Project url" />

                <flux:input label="Technologies" wire:model="form.technologies" placeholder="Technologies (comma separated)" />

                <flux:input label="Description" wire:model="form.description" placeholder="Project description" />

                <div class="flex">
                    <flux:spacer />
                    <flux:button type="submit" variant="primary">
                        {{ $form->project ? 'Update' : 'Create' }}
                    </flux:button>
                </div>
            </div>
        </form>
    </flux:modal>
</x-layouts.dashboard>
