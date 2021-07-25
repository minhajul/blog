<div class="bg-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-6 lg:py-10">

        <div class="bg-gradient-to-r from-green-600 to-blue-500 shadow-md rounded-md mb-10">
            <div class="max-w-2xl mx-auto text-center py-16 px-4 sm:py-20 sm:px-6 lg:px-8">
                <h2 class="mb-5 text-3xl font-extrabold text-white sm:text-4xl">
                    <span class="block">Search blog now.</span>
                </h2>

                <input type="text" wire:model="keywords" class="w-full block appearance-none bg-white border border-gray-400 px-5 py-3 text-sm rounded shadow leading-tight focus:outline-none" placeholder="Search blog">
            </div>
        </div>

        <div class="mt-12 max-w-lg mx-auto grid gap-5 lg:grid-cols-3 lg:max-w-none">
            @forelse($blogs as $blog)
                <div class="mb-5 flex flex-col rounded-lg shadow-lg overflow-hidden">
                    <div class="flex-shrink-0">
                        <img class="h-48 w-full object-cover" src="{{ $blog->bannerUrl() }}" alt="Banner">
                    </div>
                    <div class="flex-1 bg-white p-6 flex flex-col justify-between">
                        <div class="flex-1">
                            <a href="{{ route('home', ['slug' => $blog->slug]) }}" class="block mt-2">
                                <p class="text-xl font-semibold text-gray-900">
                                    {{ $blog->title }}
                                </p>
                                <p class="mt-3 text-base text-gray-500">
                                    {{ $blog->short_details }}
                                </p>
                            </a>
                        </div>
                        <div class="mt-5 flex items-center">
                            <div class="flex space-x-1 text-sm text-gray-500">
                                <time datetime="2020-03-16">
                                    Posted {{ $blog->created_at->diffForHumans() }}
                                </time>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p>No blog found</p>
            @endforelse
        </div>

        <div class="py-5">
            {{ $blogs->links() }}
        </div>

    </div>
</div>
