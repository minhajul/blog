<div class="px-6">

    @include('errors.success')
    @include('errors.message')

    <form wire:submit.prevent="create">
        <div class="grid grid-cols-6 gap-6">
            <div class="col-span-6">
                <label class="block font-medium text-sm text-gray-700" for="name">
                    Title <span class="text-red-500">*</span>
                </label>

                <input type="text" wire:model.defer="blog.title" class="mt-2 shadow-sm appearance-none border rounded w-full py-2 px-3 text-sm text-gray-700 leading-tight focus:outline-none">
                @error('blog.title') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="col-span-6">
                <label class="block font-medium text-sm text-gray-700" for="email">
                    Details <span class="text-red-500">*</span>
                </label>

                <input id="x" type="hidden" name="details">
                <trix-editor wire:model.defer="blog.details" input="x"></trix-editor>
                @error('blog.details') <span class="text-red-500 text-sm italic">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="flex items-center justify-end text-right mt-5">
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-xs-gray disabled:opacity-25 transition ease-in-out duration-150">
                Post Blog
            </button>
        </div>
    </form>
</div>
