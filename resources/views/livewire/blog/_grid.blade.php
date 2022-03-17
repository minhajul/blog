<div>
    <div class="grid gap-5 lg:grid-cols-3">

        @forelse($blogs as $blog)
            <div class="mb-5 flex flex-col rounded-lg shadow-lg overflow-hidden">
                <div class="shrink-0">
                    <img class="h-48 w-full object-cover" src="{{ $blog->bannerUrl() }}" alt="Banner">
                </div>
                <div class="flex-1 bg-white p-5 flex flex-col justify-between">
                    <div class="flex-1">
                        <a href="{{ route('home', ['slug' => $blog->slug]) }}" class="block">
                            <p class="transition ease-in-out duration-150 text-xl font-semibold text-gray-900 hover:text-green-500">
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
