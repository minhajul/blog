@props([
    'code',
    'title',
    'message',
])

<x-layouts.app :title="$title">
    <div class="flex min-h-[55vh] flex-col items-center justify-center py-20 text-center fadeInUp">
        <p class="font-serif text-7xl italic leading-none text-primary sm:text-8xl">{{ $code }}</p>
        <h1 class="mt-6 text-2xl font-semibold tracking-tight text-ink sm:text-3xl">{{ $title }}</h1>
        <p class="mt-3 max-w-md text-base text-ink-muted">{{ $message }}</p>

        <div class="mt-8 flex flex-wrap items-center justify-center gap-3">
            <a href="{{ route('home') }}" class="inline-flex items-center gap-2 rounded-full bg-ink px-4 py-2 text-sm font-medium text-canvas transition hover:opacity-90">
                <flux:icon.arrow-left variant="micro" />
                Back to home
            </a>
            <a href="{{ URL::current() }}" class="inline-flex items-center gap-2 rounded-full border border-line bg-surface px-4 py-2 text-sm font-medium text-ink shadow-card transition hover:border-line-strong">
                <flux:icon.arrow-path variant="micro" />
                Try reloading
            </a>
        </div>
    </div>
</x-layouts.app>
