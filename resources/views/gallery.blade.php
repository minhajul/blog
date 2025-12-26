<x-layouts.app>
    <div class="py-6 px-4 overflow-hidden sm:px-6 lg:px-8 lg:py-10">
        <div class="relative max-w-4xl mx-auto">
            <div class="text-center">
                <h2 x-intersect="$el.classList.add('fadeInUp')" class="text-3xl font-extrabold tracking-tight text-color sm:text-4xl">
                    Gallery
                </h2>
                <p x-intersect="$el.classList.add('fadeInUp')" class="mt-4 text-lg leading-6 text-color">
                    Nullam risus blandit ac aliquam justo ipsum. Quam mauris volutpat massa dictumst amet. Sapien tortor
                    lacus arcu.
                </p>
            </div>

            <ul role="list" class="py-10 grid grid-cols-2 gap-x-4 gap-y-8 sm:grid-cols-2 lg:grid-cols-3 sm:gap-x-6 xl:gap-x-8">
                @forelse($galleries as $gallery)
                    <li class="relative">
                        <div class="group block w-full aspect-w-10 aspect-h-7 rounded-lg bg-gray-100 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-offset-gray-100 focus-within:ring-indigo-500 overflow-hidden">
                            <img class="object-cover pointer-events-none group-hover:opacity-75"
                                 x-intersect="$el.classList.add('scale')"
                                 src="{{ $gallery->image_url }}"
                                 alt=""
                            >
                            <button type="button" class="absolute inset-0 focus:outline-none">
                                <span class="sr-only">{{ $gallery->id }}</span>
                            </button>
                        </div>
                    </li>
                @empty
                    <li x-intersect="$el.classList.add('fadeInUp')"
                        class="mt-4 text-lg leading-6 text-color">No gallery added
                    </li>
                @endforelse
            </ul>
        </div>
    </div>
</x-layouts.app>



