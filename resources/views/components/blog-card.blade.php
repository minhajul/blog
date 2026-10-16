@props([
    'blog',
    'featured' => false,
])

<article {{ $attributes->class([
    'group relative flex flex-col overflow-hidden card-interactive',
    'lg:flex-row' => $featured,
]) }}>
    <div @class([
        'relative overflow-hidden bg-surface-raised',
        'aspect-16/10' => ! $featured,
        'aspect-16/10 lg:aspect-auto lg:w-3/5 lg:shrink-0' => $featured,
    ])>
        <img class="absolute inset-0 size-full object-cover transition duration-700 ease-out group-hover:scale-[1.03]"
             alt=""
             loading="lazy"
             src="{{ $blog->bannerUrl() }}"
        />
    </div>

    <div @class([
        'flex grow flex-col p-6',
        'lg:justify-center lg:p-10' => $featured,
    ])>
        <div class="flex items-center gap-3 font-mono text-xs text-ink-subtle">
            @if($featured)
                <span class="rounded-full bg-primary-soft px-2 py-0.5 font-medium text-primary-ink">Latest</span>
            @endif
            <time datetime="{{ $blog->created_at->toDateString() }}">{{ $blog->created_at->format('M d, Y') }}</time>
            <span aria-hidden="true">·</span>
            <span>{{ $blog->readingTimeInMinutes() }} min read</span>
        </div>

        <h2 @class([
            'mt-3 font-semibold tracking-tight text-balance text-ink transition-colors group-hover:text-primary',
            'text-xl leading-snug' => ! $featured,
            'text-2xl leading-tight sm:text-3xl' => $featured,
        ])>
            <a href="{{ route('blog.show', $blog->slug) }}" wire:navigate>
                <span class="absolute inset-0" aria-hidden="true"></span>
                {{ $blog->title }}
            </a>
        </h2>

        <p @class([
            'mt-3 text-[0.9375rem] leading-relaxed text-ink-muted',
            'line-clamp-3' => ! $featured,
            'line-clamp-4 sm:text-base' => $featured,
        ])>
            {{ $blog->short_details }}
        </p>

        <span class="mt-auto inline-flex items-center gap-1.5 pt-6 text-sm font-medium text-ink">
            Read article
            <flux:icon.arrow-right variant="micro" class="transition-transform duration-300 group-hover:translate-x-1" />
        </span>
    </div>
</article>
