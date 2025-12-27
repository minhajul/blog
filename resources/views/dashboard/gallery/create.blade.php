<x-layouts.app>
    <x-layouts.dashboard>
        <div class="py-5 max-w-3xl mx-auto lg:max-w-7xl">
            <div class="grid grid-cols-1 gap-4 items-start lg:grid-cols-3 lg:gap-8">
                <div class="grid grid-cols-1 lg:col-span-3">
                    <div class="flex justify-between">
                        <flux:heading size="xl">Add Gallery</flux:heading>

                        <flux:button href="{{ route('gallery.index') }}">View Gallery</flux:button>
                    </div>

                    <div class="px-4 py-5 bg-white sm:p-6 shadow rounded-md my-5">

                        @include('errors.success')
                        @include('errors.message')

                        <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6">
                                    <flux:input
                                        type="file"
                                        label="Upload Image"
                                        name="image"
                                    />
                                </div>
                            </div>

                            <div class="flex justify-end mt-5">
                                <flux:button type="submit" variant="primary">
                                    Create
                                </flux:button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </x-layouts.dashboard>
</x-layouts.app>
