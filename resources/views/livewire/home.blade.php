<div class="max-w-7xl mx-auto px-4 sm:px-6 py-6 lg:py-10">
    <div class="max-w-4xl mx-auto text-center py-6 px-4 sm:py-10 sm:px-6 lg:px-8">
        <div class="grid place-items-center mb-5">
            <h1 class="text-4xl lg:text-5xl font-extrabold tracking-tighter text-on-surface mb-4 leading-none">
                Thoughts, Projects & Ideas
            </h1>
            <p class="text-lg lg:text-xl text-on-surface-variant font-light leading-relaxed">
                A curated archive of architectural logic, full-stack engineering discoveries, and the minimalist philosophy behind modern digital craftsmanship.
            </p>
        </div>
        <div class="py-6">
            <flux:input
                type="search"
                wire:model.live.debounce.300ms="keywords"
                placeholder="Search blog"
                loading="false"
            />
        </div>
    </div>

    <div class="max-w-lg mx-auto lg:max-w-none">
        <div class="grid gap-5 lg:grid-cols-3 space-y-6">
            @forelse($blogs as $blog)
                <article class="group cursor-pointer">
                    <div class="aspect-16/10 mb-6 overflow-hidden rounded-xl bg-surface-container-low">
                        <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                             data-alt="{{ $blog->title }}"
                             alt="{{ $blog->title }}"
                             src="{{ $blog->bannerUrl() }}"
                        />
                    </div>
                    <div class="space-y-4">
                        <div class="text-xs font-bold tracking-widest text-primary uppercase">
                            <span class="text-on-surface-variant/60">{{ $blog->created_at->format('d M Y') }}</span>
                        </div>
                        <a href="{{ route('blog.show', $blog->slug) }}" class="mb-3 block">
                            <h3 class="transition ease-in-out duration-150 text-2xl font-bold tracking-tight text-on-surface group-hover:text-primary">
                                {{ $blog->title }}
                            </h3>
                        </a>
                        <p class="text-on-surface-variant line-clamp-3 font-light leading-relaxed">
                            {{ $blog->short_details }}
                        </p>
                    </div>
                </article>
            @empty
                <p class="text-color">
                    No blog found
                </p>
            @endforelse
        </div>

        <div class="py-5">
            {!! $blogs->links() !!}
        </div>
    </div>
</div>

