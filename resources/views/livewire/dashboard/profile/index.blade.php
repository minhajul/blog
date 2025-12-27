<form wire:submit.prevent="save">
    <div class="px-4 py-5 bg-white sm:p-6 shadow rounded-md">

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
                <label class="block font-medium text-sm text-gray-700 mb-2" for="bio">
                    Bio
                </label>

                <x-trix-editor wire:model="bio"></x-trix-editor>
            </div>
        </div>

        <div class="flex items-center justify-end text-right mt-5">
            <flux:button type="submit" variant="primary">
                Save
            </flux:button>
        </div>
    </div>
</form>
