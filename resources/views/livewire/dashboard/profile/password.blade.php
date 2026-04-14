<form wire:submit.prevent="update">
    <div class="p-4 bg-color shadow-md rounded-md">

        @include('errors.message')

        <div class="grid grid-cols-6 gap-6">
            <div class="col-span-6">
                <flux:input
                    type="password"
                    label="Current Password"
                    wire:model="current_password"
                />
            </div>

            <div class="col-span-6">
                <flux:input
                    type="password"
                    label="New Password"
                    wire:model="password"
                />
            </div>

            <div class="col-span-6">
                <flux:input
                    type="password"
                    label="Confirm Password"
                    wire:model="password_confirmation"
                />
            </div>
        </div>

        <div class="flex items-center justify-end text-right mt-5">
            <flux:button type="submit" variant="primary">
                Change Password
            </flux:button>
        </div>
    </div>
</form>
