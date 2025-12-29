<x-layouts.dashboard>
    <div class="grid grid-cols-1 gap-4 items-start lg:grid-cols-3 lg:gap-8 py-4">
        <div class="grid grid-cols-1 lg:col-span-3">
            <div class="flex justify-between items-center text-color">
                <div>
                    <flux:heading size="xl">Experiences</flux:heading>
                    <flux:subheading>Our Future Plans, One Feature at a Time</flux:subheading>
                </div>

                <flux:button wire:click="create">Create New</flux:button>
            </div>

            <div class="mt-6 grid grid-cols-1 gap-4 sm:grid-cols-3 lg:grid-cols-1 xl:grid-cols-3">
                @forelse($experiences as $experience)
                    <div class="bg-color rounded-md p-4">
                        <div class="flex justify-between items-center">
                            <p class="text-lg font-medium tracking-tight text-color">
                                {{ $experience->title }}
                            </p>

                            <flux:button
                                wire:click="edit({{ $experience->id }})"
                                icon="pencil-square"
                                variant="ghost"
                                size="sm"
                            />
                        </div>

                        <p class="text-sm text-color">{{ $experience->description }}</p>
                    </div>
                @empty
                    <div class="bg-color rounded-md p-4">
                        <p class="font-medium tracking-tight text-color">
                            No experience added
                        </p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <flux:modal name="experience-modal" class="w-9/12 md:w-1/2">
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
