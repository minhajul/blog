<div>
    <div class="border-b-2 border-gray-100  flex items-center justify-between flex-wrap sm:flex-nowrap">
        <div class="mt-2">
            <h3 class="text-3xl my-5 tracking-tight font-extrabold text-gray-900 sm:text-4xl">
                Create Blog
            </h3>
        </div>
        <div class="ml-4 mt-2 flex-shrink-0">
            <a href="{{ route('profile.blogs') }}" class="relative inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-700 hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                View Posted Blogs
            </a>
        </div>
    </div>

    <div class="px-4 py-5 bg-white sm:p-6 shadow rounded-md">

        @include('errors.message')

        <form wire:submit.prevent="create">
            <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6">
                    <label class="block font-medium text-sm text-gray-700" for="name">
                        Title <span class="text-red-500">*</span>
                    </label>

                    <input type="text" wire:model.defer="title" class="mt-2 shadow-sm appearance-none border rounded w-full py-2 px-3 text-sm text-gray-700 leading-tight focus:outline-none">
                    @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <div class="col-span-6">
                    <label class="block font-medium text-sm text-gray-700" for="name">
                        Upload Banner <span class="text-red-500">*</span>
                    </label>

                    <input type="file" wire:model="banner" class="mt-2 shadow-sm appearance-none border rounded w-full py-2 px-3 text-sm text-gray-700 leading-tight focus:outline-none">
                    @error('banner') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <div class="col-span-6">
                    <label class="block font-medium text-sm text-gray-700" for="email">
                        Details <span class="text-red-500">*</span>
                    </label>

                    <input id="x" type="hidden" name="details">
                    <trix-editor wire:model.defer="details" input="x"></trix-editor>
                    @error('details') <span class="text-red-500 text-sm italic">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="flex items-center justify-end text-right mt-5">
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-xs-gray disabled:opacity-25 transition ease-in-out duration-150">
                    Post Blog
                </button>
            </div>
        </form>
    </div>
</div>
