<div class="py-6 px-4 overflow-hidden sm:px-6 lg:px-8 lg:py-10">

    <div class="max-w-3xl mx-auto md:max-w-3xl">
        @forelse($blogs as $blog)
            <div class="md:flex mb-5 bg-white dark:bg-slate-700 rounded-xl shadow-md overflow-hidden">
                <div class="md:shrink-0">
                    <img class="h-52 w-full object-cover md:w-48" src="{{ $blog->bannerUrl() }}" alt="Banner">
                </div>
                <div class="p-4">
                    <div class="flex-1">
                        <a href="{{ route('home', ['slug' => $blog->slug]) }}" class="block">
                            <p class="transition ease-in-out duration-150 text-xl font-semibold text-slate-900 dark:text-white">
                                {{ $blog->title }}
                            </p>
                            <p class="mt-3 text-base text-slate-500 dark:text-slate-400">
                                {{ $blog->short_details }}
                            </p>
                        </a>
                    </div>
                    <div class="pt-6 flex space-x-1 text-sm text-slate-500 dark:text-slate-400">
                        <time datetime="2020-03-16">
                            Posted {{ $blog->created_at->diffForHumans() }}
                        </time>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-slate-500 dark:text-slate-400">
                No blog found
            </p>
        @endforelse

        <div class="py-5">
            {{ $blogs->links() }}
        </div>
    </div>
</div>
