<div class="px-6">

    @include('errors.success')
    @include('errors.message')

    <form wire:submit.prevent="createJob">
        <div class="grid grid-cols-6 gap-6">
            <div class="col-span-6">
                <label class="block font-medium text-sm text-gray-700" for="name">
                    Title <span class="text-red-500">*</span>
                </label>

                <input type="text" wire:model.defer="title" class="mt-2 shadow-sm appearance-none border rounded w-full py-2 px-3 text-sm text-gray-700 leading-tight focus:outline-none">
                @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="col-span-6">
                <label class="block font-medium text-sm text-gray-700" for="email">
                    Type <span class="text-red-500">*</span>
                </label>

                <select wire:model.defer="type" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:outline-none focus:ring-gray-300 focus:border-gray-300 sm:text-sm rounded-md">
                    <option selected value="">----</option>
                    @foreach(config('enums.job_type') as $type)
                        <option value="{{ $type }}">{{ $type }}</option>
                    @endforeach
                </select>
                @error('type') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="col-span-6">
                <label class="block font-medium text-sm text-gray-700" for="email">
                    Department <span class="text-red-500">*</span>
                </label>

                <input type="text" wire:model.defer="department" class="mt-2 shadow-sm appearance-none border rounded w-full py-2 px-3 text-sm text-gray-700 leading-tight focus:outline-none">
                @error('department') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="col-span-6">
                <label class="block font-medium text-sm text-gray-700" for="email">
                    Location <span class="text-red-500">*</span>
                </label>

                <input type="text" wire:model.defer="location" class="mt-2 shadow-sm appearance-none border rounded w-full py-2 px-3 text-sm text-gray-700 leading-tight focus:outline-none">
                @error('location') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="col-span-6">
                <label class="block font-medium text-sm text-gray-700" for="email">
                    Closing On <span class="text-red-500">*</span>
                </label>

                <input type="date" wire:model.defer="closing_on" class="mt-2 shadow-sm appearance-none border rounded w-full py-2 px-3 text-sm text-gray-700 leading-tight focus:outline-none">
                @error('closing_on') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="col-span-6">
                <label class="block font-medium text-sm text-gray-700" for="email">
                    Description <span class="text-red-500">*</span>
                </label>

                <input id="x" type="hidden" name="descriptions">
                <trix-editor wire:model.defer="descriptions" input="x"></trix-editor>
                @error('descriptions') <span class="text-red-500 text-sm italic">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="flex items-center justify-end text-right mt-5">
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-xs-gray disabled:opacity-25 transition ease-in-out duration-150">
                Post Job
            </button>
        </div>
    </form>
</div>
