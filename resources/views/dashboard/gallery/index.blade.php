<x-layouts.app>
    <x-layouts.dashboard>
        <div class="py-5 max-w-3xl mx-auto lg:max-w-7xl">
            <div class="flex justify-between">
                <flux:heading size="xl">Gallery</flux:heading>

                <flux:button href="{{ route('gallery.create') }}">Create New</flux:button>
            </div>

            <ul role="list" class="py-10 grid grid-cols-2 gap-x-4 gap-y-8 sm:grid-cols-2 lg:grid-cols-3 sm:gap-x-6 xl:gap-x-8">
                @forelse($galleries as $gallery)
                    <li class="relative">
                        <div class="group block w-full aspect-w-10 aspect-h-7 rounded-lg bg-gray-100 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-offset-gray-100 focus-within:ring-indigo-500 overflow-hidden">
                            <img src="{{ $gallery->image_url }}" alt="" class="object-cover pointer-events-none group-hover:opacity-75">
                            <button type="button" class="absolute inset-0 focus:outline-none">
                                <span class="sr-only">View details</span>
                            </button>
                        </div>

                        <div class="py-2 float-right">
                            <a onclick="return confirm('Are you sure?')" href="{{ route('gallery.destroy', $gallery) }}" class="focus:outline-none text-red-500 font-normal py-2">
                                Delete
                            </a>
                        </div>
                    </li>
                @empty
                    <li class="relative">
                        No gallery added
                    </li>
                @endforelse
            </ul>
        </div>
    </x-layouts.dashboard>
</x-layouts.app>
