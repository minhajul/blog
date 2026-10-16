@php($showFeatured = blank($keywords) && $blogs->onFirstPage())

<div>
    <x-page-header
        eyebrow="The blog"
        lead="Notes on full-stack engineering, system design and the quiet craft of building software that lasts."
    >
        <x-slot:title>
            Thoughts, projects <span class="font-serif font-normal italic tracking-normal text-primary">&amp; ideas</span>
        </x-slot:title>

        <flux:input
            type="search"
            icon="magnifying-glass"
            wire:model.live.debounce.300ms="keywords"
            placeholder="Search articles…"
            aria-label="Search articles"
            class="mt-8 max-w-lg"
            class:input="h-11 rounded-full! bg-surface! shadow-card"
        />
    </x-page-header>

    @if($blogs->isEmpty())
        <x-empty-state icon="document-magnifying-glass" title="No blog found">
            @if(filled($keywords))
                Nothing matches “{{ $keywords }}”. Try a different search.
            @else
                New writing is on its way. Check back soon.
            @endif
        </x-empty-state>
    @else
        <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
            @foreach($blogs as $blog)
                <x-blog-card :blog="$blog" :featured="$showFeatured && $loop->first" />
            @endforeach
        </div>

        @if($blogs->hasPages())
            <div class="mt-10">
                <flux:pagination :paginator="$blogs" />
            </div>
        @endif
    @endif
</div>
