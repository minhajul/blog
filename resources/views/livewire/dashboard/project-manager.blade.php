<x-layouts.dashboard>
    <div class="grid grid-cols-1 gap-4 items-start lg:grid-cols-3 lg:gap-8 py-4">
        <div class="grid grid-cols-1 lg:col-span-3">
            <div class="flex justify-between items-center text-color">
                <div>
                    <flux:heading size="xl">Projects</flux:heading>
                    <flux:subheading>Our Future Plans, One Feature at a Time</flux:subheading>
                </div>

                <flux:button wire:click="create">Create New</flux:button>
            </div>

            <div class="mt-6 grid grid-cols-1 gap-4 sm:grid-cols-3 lg:grid-cols-1 xl:grid-cols-3">
                @forelse($projects as $project)
                    <div class="bg-color rounded-md p-4">
                        <div class="flex justify-between items-center">
                            <p class="text-lg font-medium tracking-tight text-color">
                                {{ $project->title }}
                            </p>

                            <flux:button
                                wire:click="edit({{ $project->id }})"
                                icon="pencil-square"
                                variant="ghost"
                                size="xs"
                            />
                        </div>

                        <p class="text-sm text-color">{{ $project->short_description }}</p>
                    </div>
                @empty
                    <div class="bg-color rounded-md p-4">
                        <p class="font-medium tracking-tight text-color">
                            No project added
                        </p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <flux:modal name="project-modal" class="w-9/12 md:w-1/2">
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
