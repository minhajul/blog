<div>

    <div class="border-b-2 border-gray-100  flex items-center justify-between flex-wrap sm:flex-nowrap">
        <div class="mt-2">
            <h3 class="text-3xl my-5 tracking-tight font-extrabold text-gray-900 sm:text-4xl">
                Posted Blogs
            </h3>
        </div>
        <div class="ml-4 mt-2 flex-shrink-0">
            <a href="{{ route('profile.blog.create') }}" class="relative inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-700 hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Create New Blog
            </a>
        </div>
    </div>

    <div class="border-b border-gray-200">
        <nav class="-mb-px flex content-center space-x-8" aria-label="Tabs">
            @foreach(config('enums.blog_status') as $item)
                <p wire:click="filterByStatus('{{ $item }}')" class="cursor-pointer border-transparent text-gray-500 {{ $status == $item ? "border-indigo-500 text-indigo-600" : "hover:text-gray-700 hover:border-gray-300" }} whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                    {{ ucfirst($item) }}
                </p>
            @endforeach
        </nav>
    </div>

    <div class="mt-6">
        <input type="text" wire:model="keywords" class="w-full block appearance-none bg-white border border-gray-400 px-4 py-2 text-sm rounded shadow leading-tight focus:outline-none" placeholder="Search">
    </div>

    <div class="mt-10 max-w-lg mx-auto grid gap-5 lg:grid-cols-3 lg:max-w-none">
        @forelse($blogs as $blog)
            <div class="mb-5 flex flex-col rounded-lg shadow-lg overflow-hidden">
                <div class="flex-shrink-0">
                    <img class="h-48 w-full object-cover" src="{{ $blog->bannerUrl() }}" alt="Banner">
                </div>
                <div class="flex-1 bg-white p-5 flex flex-col justify-between">
                    <div class="flex-1">
                        <a href="{{ route('profile.blog.show', $blog) }}" class="block">
                            <p class="text-xl font-semibold text-gray-900">
                                {{ $blog->title }} <span class="text-xs text-white bg-green-500 p-1 rounded-md">{{ $blog->status }}</span>
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
