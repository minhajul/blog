@props([
    'blog',
    'featured' => false,
])

<article {{ $attributes->class([
    'group relative flex flex-col overflow-hidden card-interactive',
    'sm:col-span-2 lg:col-span-3 lg:flex-row' => $featured,
]) }}>
    <div @class([
        'relative aspect-16/10 overflow-hidden bg-surface-raised',
        'lg:aspect-auto lg:w-1/2 lg:shrink-0' => $featured,
    ])>
        <img class="absolute inset-0 size-full object-cover transition duration-700 ease-out group-hover:scale-[1.03]"
             alt=""
             loading="lazy"
             src="{{ $blog->bannerUrl() }}"
        />
    </div>

    <div @class([
        'flex grow flex-col p-5',
        'lg:justify-center lg:p-8' => $featured,
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
            'mt-2.5 font-semibold tracking-tight text-balance text-ink transition-colors group-hover:text-primary',
            'text-lg leading-snug' => ! $featured,
            'text-xl leading-tight sm:text-2xl' => $featured,
        ])>
            <a href="{{ route('blog.show', $blog->slug) }}" wire:navigate>
                <span class="absolute inset-0" aria-hidden="true"></span>
                {{ $blog->title }}
            </a>
        </h2>

        <p @class([
            'mt-2 text-sm leading-relaxed text-ink-muted',
            'line-clamp-3' => ! $featured,
            'line-clamp-4' => $featured,
        ])>
            {{ $blog->short_details }}
        </p>

        <span class="mt-auto inline-flex items-center gap-1.5 pt-5 text-sm font-medium text-ink">
            Read article
            <flux:icon.arrow-right variant="micro" class="transition-transform duration-300 group-hover:translate-x-1" />
        </span>
    </div>
</article>
