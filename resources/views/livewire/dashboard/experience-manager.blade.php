<x-layouts.dashboard>
    <x-dashboard.heading title="Experiences" description="Roles and companies shown on your career timeline.">
        <x-slot:actions>
            <flux:button wire:click="create" variant="primary" icon="plus">New experience</flux:button>
        </x-slot:actions>
    </x-dashboard.heading>

    <div class="mt-6 grid gap-4 sm:grid-cols-2 xl:grid-cols-3">
        @forelse($experiences as $experience)
            <div class="card flex flex-col p-5">
                <div class="flex items-start justify-between gap-3">
                    <div>
                        <p class="font-semibold leading-snug text-ink">
                            {{ $experience->title }}
                        </p>
                        <p class="mt-0.5 text-sm font-medium text-primary">
                            {{ $experience->company_name }}
                        </p>
                    </div>

                    <flux:button
                        wire:click="edit({{ $experience->id }})"
                        icon="pencil-square"
                        variant="ghost"
                        size="xs"
                        aria-label="Edit experience"
                    />
                </div>

                <div class="mt-auto flex items-center gap-2 pt-4 font-mono text-xs text-ink-subtle uppercase">
                    {{ $experience->start_date->format('M Y') }}
                    &mdash;
                    {{ $experience->end_date ? $experience->end_date->format('M Y') : 'Running' }}
                    @if($experience->isCurrent())
                        <flux:badge size="sm" color="green" class="normal-case">Current</flux:badge>
                    @endif
                </div>
            </div>
        @empty
            <div class="card col-span-full flex flex-col items-center px-6 py-16 text-center">
                <flux:icon.briefcase class="text-ink-subtle" />
                <p class="mt-3 font-medium text-ink">No experience added</p>
                <p class="mt-1 text-sm text-ink-muted">Add a role to start your career timeline.</p>
            </div>
        @endforelse
    </div>

    <flux:modal name="experience-modal" class="w-full md:w-2xl">
        <form wire:submit="save">
            <div class="space-y-6">
                <div>
                    <flux:heading size="lg">{{ $form->experience ? 'Edit' : 'Create' }} Experience</flux:heading>
                    <flux:text class="mt-2">{{ $form->experience ? 'Update existing experience details.' : 'Add your next experience.' }}</flux:text>
                </div>
                <flux:input label="Title" wire:model="form.title" placeholder="Title" />

                <flux:input label="Company Name" wire:model="form.company_name" placeholder="Company name" />

                <flux:input label="Company Website" wire:model="form.company_website" placeholder="Company website" />

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <flux:input type="date" label="Start Date" wire:model="form.start_date" />

                    <flux:input
                        type="date"
                        label="End Date"
                        wire:model="form.end_date"
                        :disabled="$form->current"
                    />
                </div>

                <flux:checkbox
                    label="Currently working here"
                    wire:model.live="form.current"
                />

                <div>
                    <x-trix-editor label="Description" wire:model="form.description"></x-trix-editor>
                </div>

                <div class="flex">
                    <flux:spacer />
                    <flux:button type="submit" variant="primary">
                        {{ $form->experience ? 'Update' : 'Create' }}
                    </flux:button>
                </div>
            </div>
        </form>
    </flux:modal>
</x-layouts.dashboard>
