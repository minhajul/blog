<x-layouts.app :title="$blog->title">
    <div
        x-data="{
            progress: 0,
            maxScroll: 1,
            isFramePending: false,
            measure() {
                this.maxScroll = Math.max(1, document.documentElement.scrollHeight - window.innerHeight);
                this.update();
            },
            update() {
                this.progress = Math.min(1, window.scrollY / this.maxScroll);
            },
            scheduleUpdate() {
                if (this.isFramePending) {
                    return;
                }

                this.isFramePending = true;
                requestAnimationFrame(() => {
                    this.update();
                    this.isFramePending = false;
                });
            },
        }"
        x-init="measure()"
        x-on:scroll.window.passive="scheduleUpdate()"
        x-on:resize.window="measure()"
        x-on:load.window="measure()"
        class="fixed inset-x-0 top-0 z-50 h-0.5"
        aria-hidden="true"
    >
        <div class="h-full origin-left bg-primary" style="transform: scaleX(0)" :style="`transform: scaleX(${progress})`"></div>
    </div>

    <article class="pt-10 sm:pt-12">
        <header class="mx-auto max-w-2xl fadeInUp">
            <a href="{{ route('home') }}" wire:navigate class="group inline-flex items-center gap-1.5 text-sm font-medium text-ink-muted transition hover:text-ink">
                <flux:icon.arrow-left variant="micro" class="transition-transform group-hover:-translate-x-0.5" />
                All articles
            </a>

            <h1 class="mt-6 text-2xl font-semibold tracking-tight text-balance text-ink sm:text-4xl sm:leading-[1.15]">
                {{ $blog->title }}
            </h1>

            <div class="mt-4 flex flex-wrap items-center gap-x-4 gap-y-2 font-mono text-xs text-ink-subtle">
                <span class="inline-flex items-center gap-1.5">
                    <flux:icon.calendar-days variant="micro" />
                    <time datetime="{{ $blog->created_at->toDateString() }}">{{ $blog->created_at->format('M d, Y') }}</time>
                </span>
                <span class="inline-flex items-center gap-1.5">
                    <flux:icon.clock variant="micro" />
                    {{ $blog->readingTimeInMinutes() }} min read
                </span>
                <span class="inline-flex items-center gap-1.5">
                    <flux:icon.eye variant="micro" />
                    {{ number_format($blog->hit_count) }} reads
                </span>
            </div>
        </header>

        <figure class="mx-auto mt-8 max-w-3xl overflow-hidden rounded-2xl border border-line bg-surface-raised sm:mt-10 scale">
            <img src="{{ $blog->bannerUrl() }}" alt="" class="aspect-2/1 w-full object-cover">
        </figure>

        <div class="article-content mx-auto mt-10 max-w-2xl sm:mt-12">
            {!! $blog->details !!}
        </div>

        <footer class="mx-auto mt-16 max-w-2xl">
            <div class="card flex flex-col gap-5 p-5 sm:flex-row sm:items-center sm:justify-between sm:p-6">
                <div>
                    <p class="font-serif text-xl italic text-ink">Thanks for reading.</p>
                    <p class="mt-1 text-sm text-ink-muted">There’s more where that came from.</p>
                </div>
                <a href="{{ route('home') }}" wire:navigate class="group btn-primary shrink-0">
                    Browse all articles
                    <flux:icon.arrow-right variant="micro" class="transition-transform group-hover:translate-x-0.5" />
                </a>
            </div>
        </footer>
    </article>
</x-layouts.app>
