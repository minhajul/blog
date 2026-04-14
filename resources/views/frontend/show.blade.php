<x-layouts.app>
    <div class="py-8 lg:py-12">
        <article class="max-w-7xl lg:max-w-3xl mx-auto px-0 lg:px-4">
            <header class="mb-10">
                <a href="{{ route('home') }}" class="inline-flex items-center gap-2 text-sm text-on-surface-variant hover:text-primary transition-colors mb-6">
                    <flux:icon.arrow-left variant="mini" />
                    Back to home
                </a>

                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold tracking-tight text-on-surface leading-tight mb-6">
                    {{ $blog->title }}
                </h1>

                <div class="flex items-center gap-4 text-sm text-on-surface-variant">
                    <span class="flex items-center gap-1.5">
                         <flux:icon.calendar-days variant="mini" />
                        {{ $blog->created_at->format('d M Y') }}
                    </span>
                    <span class="flex items-center gap-1.5">
                        <flux:icon.eye variant="mini" />
                        {{ $blog->hit_count }} reads
                    </span>
                </div>
            </header>

            <div class="prose prose-lg prose-slate dark:prose-invert max-w-none text-on-surface-variant leading-relaxed">
                {!! $blog->details !!}
            </div>

            <footer class="mt-12 pt-8 border-t border-on-surface-variant/10">
                <a href="{{ route('home') }}" class="inline-flex items-center gap-2 text-primary font-medium hover:gap-3 transition-all duration-300">
                    <span>Read more blogs</span>
                    <flux:icon.arrow-right variant="mini" />
                </a>
            </footer>
        </article>
    </div>
</x-layouts.app>
