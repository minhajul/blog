<form wire:submit.prevent="save">
    <div class="card p-5">

        @include('errors.message')
        @include('errors.success')

        <div class="grid grid-cols-6 gap-6">
            <div class="col-span-6">
                <flux:input type="file" label="Upload Profile Picture" wire:model="avatar" />
            </div>

            <div class="col-span-6">
                <flux:input type="text" label="Name" wire:model="name" />
            </div>

            <div class="col-span-6">
                <flux:input type="text" label="Email" wire:model="email" readonly="true" />
            </div>

            <div class="col-span-6">
                <label class="mb-2 block text-sm font-medium text-ink" for="bio">
                    Bio
                </label>

                <x-trix-editor wire:model="bio"></x-trix-editor>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end border-t border-line pt-5">
            <flux:button type="submit" variant="primary">
                Save
            </flux:button>
        </div>
    </div>
</form>
