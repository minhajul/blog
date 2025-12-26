<x-layouts.app>
    <x-layouts.dashboard>
        <div class="py-5 max-w-3xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
            <div class="grid grid-cols-1 gap-4 items-start lg:grid-cols-3 lg:gap-8">
                <div class="grid grid-cols-1 lg:col-span-3">
                    <div class="flex justify-between">
                        <flux:heading size="xl">Add Gallery</flux:heading>

                        <flux:button href="{{ route('dashboard.gallery.index') }}" variant="primary">View Gallery</flux:button>
                    </div>

                    <div class="px-4 py-5 bg-white sm:p-6 shadow rounded-md my-5">

                        @include('errors.success')
                        @include('errors.message')

                        <form action="{{ route('dashboard.gallery.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf

                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6">
                                    <label class="block font-medium text-sm text-gray-700" for="image">
                                        Upload Image <span class="text-red-500">*</span>
                                    </label>

                                    <input type="file" name="image"
                                           class="mt-2 shadow-sm appearance-none border rounded w-full py-2 px-3 text-sm text-gray-700 leading-tight focus:outline-none">
                                    @error('image') <span
                                        class="text-red-500 text-sm italic">{{ $message }}</span> @enderror
                                </div>

                            </div>

                            <div class="mt-5">
                                <button type="submit"
                                        class="float-right inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-800 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Create
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </x-layouts.dashboard>
</x-layouts.app>
