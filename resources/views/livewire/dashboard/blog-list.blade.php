@php($statusBadgeColors = ['published' => 'green', 'drafted' => 'amber', 'archived' => 'zinc'])

<x-layouts.dashboard>
    <x-dashboard.heading title="Blogs" description="Write, publish and manage your articles.">
        <x-slot:actions>
            <flux:button href="{{ route('dashboard.blogs.create') }}" variant="primary" icon="plus">New post</flux:button>
        </x-slot:actions>
    </x-dashboard.heading>

    <div class="mt-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div class="inline-flex rounded-full border border-line bg-surface p-1 shadow-card">
            @foreach($statuses as $item)
                <button
                    type="button"
                    wire:click="filterByStatus('{{ $item->value }}')"
                    @class([
                        'cursor-pointer rounded-full px-4 py-1.5 text-sm font-medium transition',
                        'bg-ink text-canvas' => $status === $item->value,
                        'text-ink-muted hover:text-ink' => $status !== $item->value,
                    ])
                >
                    {{ $item->label() }}
                </button>
            @endforeach
        </div>

        <div class="sm:w-72">
            <flux:input
                type="search"
                icon="magnifying-glass"
                wire:model.live.debounce.300ms="keywords"
                placeholder="Search blogs"
            />
        </div>
    </div>

    <div class="mt-6 grid gap-4 sm:grid-cols-2 xl:grid-cols-3">
        @forelse($blogs as $blog)
            <div class="group flex flex-col overflow-hidden card">
                <a href="{{ route('dashboard.blogs.edit', $blog) }}" class="relative block aspect-16/9 overflow-hidden bg-surface-raised">
                    <img class="size-full object-cover transition duration-500 group-hover:scale-[1.03]" src="{{ $blog->bannerUrl() }}" alt="">
                    <flux:badge size="sm" :color="$statusBadgeColors[$blog->status] ?? 'zinc'" class="absolute top-3 left-3 capitalize">
                        {{ $blog->status }}
                    </flux:badge>
                </a>

                <div class="flex grow flex-col p-4">
                    <a href="{{ route('dashboard.blogs.edit', $blog) }}" class="block">
                        <h2 class="font-semibold leading-snug text-ink transition-colors group-hover:text-primary">{{ $blog->title }}</h2>
                        <p class="mt-2 line-clamp-2 text-sm text-ink-muted">{{ $blog->short_details }}</p>
                    </a>

                    <div class="mt-auto flex items-center justify-between gap-3 pt-5 text-xs text-ink-subtle">
                        <span class="inline-flex items-center gap-3 font-mono">
                            <time datetime="{{ $blog->created_at }}">{{ $blog->created_at->diffForHumans() }}</time>
                            <span class="inline-flex items-center gap-1">
                                <flux:icon.eye variant="micro" />
                                {{ number_format($blog->hit_count) }}
                            </span>
                        </span>

                        @if(!$blog->isArchived())
                            <flux:button
                                href="{{ route('dashboard.blogs.archived', $blog) }}"
                                variant="ghost"
                                size="xs"
                                icon="archive-box"
                                onclick="return confirm('Are you sure?')"
                            >
                                Archive
                            </flux:button>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="card col-span-full flex flex-col items-center px-6 py-16 text-center">
                <flux:icon.document-text class="text-ink-subtle" />
                <p class="mt-3 font-medium text-ink">No blog found</p>
                <p class="mt-1 text-sm text-ink-muted">Try another status or search term.</p>
            </div>
        @endforelse
    </div>

    @if($blogs->hasPages())
        <div class="mt-8">
            <flux:pagination :paginator="$blogs" />
        </div>
    @endif
</x-layouts.dashboard>
