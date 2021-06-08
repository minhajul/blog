<div>
    <form wire:submit.prevent="save">
        <div class="px-4 py-5 bg-white sm:p-6 shadow rounded-md">

            @include('errors.message')

            <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6">
                    <label class="block font-medium text-sm text-gray-700" for="email">
                        Bio <span class="text-red-500">*</span>
                    </label>

                    <input id="x" type="hidden" name="user.bio">
                    <trix-editor wire:model.defer="user.bio" input="x"></trix-editor>
                    @error('user.bio') <span class="text-red-500 text-sm italic">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="flex items-center justify-end text-right mt-5">
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-xs-gray disabled:opacity-25 transition ease-in-out duration-150">
                    Save
                </button>
            </div>
        </div>
    </form>
</div>
