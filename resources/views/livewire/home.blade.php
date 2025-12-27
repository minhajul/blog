<div class="max-w-7xl mx-auto px-4 sm:px-6 py-6 lg:py-10">
    <div class="max-w-2xl mx-auto text-center py-10 px-4 sm:py-16 sm:px-6 lg:px-8">
        <div class="grid place-items-center">
            <h2 class="mb-5 animate-move-bg bg-gradient-to-r from-indigo-500 via-pink-500 to-indigo-500 bg-[length:400%] bg-clip-text text-3xl font-extrabold sm:text-4xl font-bold text-transparent">
                Search from blog now.
            </h2>
        </div>

        <flux:input
            type="search"
            wire:model.live.debounce.300ms="keywords"
            placeholder="Search blog"
            loading="false"
        />
    </div>

    <div class="max-w-lg mx-auto lg:max-w-none">
        <div class="grid gap-5 lg:grid-cols-3">
            @forelse($blogs as $blog)
                <div class="mb-5 flex flex-col rounded-md shadow-md overflow-hidden">
                    <div class="shrink-0">
                        <img class="h-48 w-full object-cover" src="{{ $blog->bannerUrl() }}" alt="Banner">
                    </div>
                    <div class="flex-1 bg-color p-5 flex flex-col justify-between">
                        <div class="flex-1">
                            <a href="{{ route('blog.show', $blog->slug) }}" class="block">
                                <p class="transition ease-in-out duration-150 text-xl font-semibold text-color">
                                    {{ $blog->title }}
                                </p>
                                <p class="mt-3 text-base text-color">
                                    {{ $blog->short_details }}
                                </p>
                            </a>
                        </div>
                        <div class="mt-5 flex items-center">
                            <div class="flex space-x-1 text-sm text-color">
                                <time datetime="2020-03-16">
                                    Posted {{ $blog->created_at->diffForHumans() }}
                                </time>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-color">
                    No blog found
                </p>
            @endforelse
        </div>

        <div class="py-5">
            {!! $blogs->links() !!}
        </div>
    </div>
</div>

