@php($showFeatured = blank($keywords) && $blogs->onFirstPage() && $blogs->isNotEmpty())

<div>
    <x-page-header
        eyebrow="The blog"
        lead="Notes on full-stack engineering, system design and the quiet craft of building software that lasts."
    >
        <x-slot:title>
            Thoughts, projects <span class="font-serif font-normal italic tracking-normal text-primary">&amp; ideas</span>
        </x-slot:title>

        <div class="relative mt-8 max-w-lg">
            <flux:icon.magnifying-glass variant="mini" class="pointer-events-none absolute top-1/2 left-4 -translate-y-1/2 text-ink-subtle" />
            <input
                type="search"
                wire:model.live.debounce.300ms="keywords"
                placeholder="Search articles…"
                aria-label="Search articles"
                class="h-11 w-full rounded-full border border-line bg-surface pr-5 pl-11 text-sm text-ink shadow-card transition placeholder:text-ink-subtle hover:border-line-strong focus:border-primary focus:ring-4 focus:ring-primary/15 focus:outline-none"
            />
            <div wire:loading.delay wire:target="keywords" class="absolute top-1/2 right-4 -translate-y-1/2">
                <flux:icon.loading variant="mini" class="text-ink-subtle" />
            </div>
        </div>
    </x-page-header>

    @if($blogs->isEmpty())
        <div class="card flex flex-col items-center px-6 py-16 text-center">
            <div class="grid size-12 place-items-center rounded-full bg-surface-raised text-ink-subtle">
                <flux:icon.document-magnifying-glass />
            </div>
            <p class="mt-4 text-lg font-medium text-ink">No blog found</p>
            <p class="mt-1 text-sm text-ink-muted">
                @if(filled($keywords))
                    Nothing matches “{{ $keywords }}”. Try a different search.
                @else
                    New writing is on its way. Check back soon.
                @endif
            </p>
        </div>
    @else
        <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
            @foreach($blogs as $blog)
                @if($showFeatured && $loop->first)
                    <x-blog-card :blog="$blog" featured class="sm:col-span-2 lg:col-span-3" />
                @else
                    <x-blog-card :blog="$blog" />
                @endif
            @endforeach
        </div>

        @if($blogs->hasPages())
            <div class="mt-10">
                <flux:pagination :paginator="$blogs" />
            </div>
        @endif
    @endif
</div>
