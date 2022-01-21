<form wire:submit.prevent="update">
    <div class="px-4 py-5 bg-white sm:p-6 shadow rounded-md">

        @include('errors.message')

        <div class="grid grid-cols-6 gap-6">
            <div class="col-span-6">
                <label class="block font-medium text-sm text-gray-700" for="current_password">
                    Current Password <span class="text-red-500">*</span>
                </label>

                <input type="password" wire:model="current_password" class="mt-2 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none" autocomplete="current-password">
                @error('current_password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="col-span-6">
                <label class="block font-medium text-sm text-gray-700" for="password">
                    New Password <span class="text-red-500">*</span>
                </label>

                <input type="password" wire:model="password" class="mt-2 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none" autocomplete="new-password">
                @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="col-span-6">
                <label class="block font-medium text-sm text-gray-700" for="password_confirmation">
                    Confirm Password <span class="text-red-500">*</span>
                </label>

                <input type="password" wire:model="password_confirmation" class="mt-2 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none" autocomplete="new-password">
                @error('password_confirmation') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="flex items-center justify-end text-right mt-5">
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-xs-gray disabled:opacity-25 transition ease-in-out duration-150">
                Change Password
            </button>
        </div>
    </div>
</form>
