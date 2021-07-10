<div class="bg-gray-100 py-6 px-4 overflow-hidden sm:px-6 lg:px-8 lg:py-10">
    <div class="relative max-w-3xl mx-auto">

        <div class="mt-5">
            <div class="text-center">
                <h2 class="text-3xl tracking-tight font-extrabold text-gray-900 sm:text-4xl">
                    From the blog
                </h2>
            </div>

            <div class="mt-6">
                <input type="text" wire:model="keywords" class="w-full block appearance-none bg-white border border-gray-400 px-4 py-3 text-sm rounded shadow leading-tight focus:outline-none" placeholder="Search blog">
            </div>

            <div class="mt-12 max-w-lg mx-auto lg:max-w-none">
                @foreach($blogs as $blog)
                    <div class="mb-5 max-w-3xl mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-3xl">
                        <div class="md:flex">
                            <div class="md:flex-shrink-0">
                                <img class="h-52 w-full object-cover md:w-48" src="{{ $blog->bannerUrl() }}" alt="Banner">
                            </div>
                            <div class="p-4">
                                <a href="{{ route('home', ['slug' => $blog->slug]) }}" class="block mt-1 text-lg leading-tight font-medium text-black hover:underline">
                                    {{ $blog->title }}
                                </a>
                                <p class="mt-2 text-gray-500">
                                    {{ $blog->short_details }}
                                </p>

                                <div class="pt-6 flex space-x-1 text-sm text-gray-500">
                                    <time datetime="2020-03-16">
                                        Posted {{ $blog->created_at->diffForHumans() }}
                                    </time>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="py-5">
                {{ $blogs->links() }}
            </div>

        </div>
    </div>
</div>
