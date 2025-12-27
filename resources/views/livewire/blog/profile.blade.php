<div>
    <div class="border-b border-gray-200">
        <nav class="-mb-px flex content-center space-x-8" aria-label="Tabs">
            @foreach(\App\Enums\BlogStatus::cases() as $item)
                <p wire:click="filterByStatus('{{ $item }}')" class="cursor-pointer border-transparent text-gray-500 {{ $status == $item ? "border-indigo-500 text-indigo-600" : "hover:text-gray-700 hover:border-gray-300" }} whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                    {{ ucfirst($item->value) }}
                </p>
            @endforeach
        </nav>
    </div>

    <div class="my-6">
        <flux:input type="text" wire:model.live.debounce.300ms="keywords" placeholder="Search blogs" />
    </div>

    <div class="max-w-lg mx-auto grid gap-5 lg:grid-cols-3 lg:max-w-none">
        @forelse($blogs as $blog)
            <div class="mb-5 flex flex-col rounded-md shadow-md overflow-hidden">
                <div class="shrink-0">
                    <img class="h-48 w-full object-cover" src="{{ $blog->bannerUrl() }}" alt="Banner">
                </div>
                <div class="flex-1 bg-white p-5 flex flex-col justify-between">
                    <div class="flex-1">
                        <a href="{{ route('dashboard.blogs.show', $blog) }}" class="block">
                            <p class="text-xl font-semibold text-gray-900">
                                {{ $blog->title }} <span class="text-xs text-white bg-green-500 p-1 rounded-md">{{ $blog->status }}</span>
                            </p>
                            <p class="mt-3 text-base text-gray-500">
                                {{ $blog->short_details }}
                            </p>
                        </a>
                    </div>

                    <div class="mt-5 flex justify-between  text-sm text-gray-500">
                        <div>
                            <time datetime="2020-03-16">
                                Posted {{ $blog->created_at->diffForHumans() }}
                            </time>
                        </div>

                        @if(!$blog->isArchived())
                            <a onclick="return confirm('Are you sure?')" href="{{ route('dashboard.blogs.archived', $blog) }}" class="order-last text-xs bg-red-500 text-white p-1 rounded-md">Mark as Archive</a>
                        @endif
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
