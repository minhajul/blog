<div class="bg-gray-100 py-6 px-4 overflow-hidden sm:px-6 lg:px-8 lg:py-10">
    <div class="relative max-w-3xl mx-auto">

        @include('livewire.partials.blog-search')

        <div class="mt-5">
            <div class="mt-12 max-w-lg mx-auto lg:max-w-none">
                @forelse($blogs as $blog)
                    <div class="mb-5 max-w-3xl mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-3xl">
                        <div class="md:flex">
                            <div class="md:flex-shrink-0">
                                <img class="h-52 w-full object-cover md:w-48" src="{{ $blog->bannerUrl() }}" alt="Banner">
                            </div>
                            <div class="p-4">
                                <div class="flex-1">
                                    <a href="{{ route('home', ['slug' => $blog->slug]) }}" class="block">
                                        <p class="text-xl font-semibold text-gray-900 hover:text-green-500">
                                            {{ $blog->title }}
                                        </p>
                                        <p class="mt-3 text-base text-gray-500">
                                            {{ $blog->short_details }}
                                        </p>
                                    </a>
                                </div>
                                <div class="pt-6 flex space-x-1 text-sm text-gray-500">
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
</div>
