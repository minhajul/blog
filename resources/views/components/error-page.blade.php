@props([
    'code',
    'title',
    'message',
])

<x-layouts.app :title="$title">
    <div class="flex min-h-[60vh] flex-col items-center justify-center py-24 text-center fadeInUp">
        <p class="font-serif text-8xl italic leading-none text-primary sm:text-9xl">{{ $code }}</p>
        <h1 class="mt-8 text-3xl font-semibold tracking-tight text-ink sm:text-4xl">{{ $title }}</h1>
        <p class="mt-4 max-w-md text-lg text-ink-muted">{{ $message }}</p>

        <div class="mt-10 flex flex-wrap items-center justify-center gap-3">
            <a href="{{ route('home') }}" class="inline-flex items-center gap-2 rounded-full bg-ink px-5 py-2.5 text-sm font-medium text-canvas transition hover:opacity-90">
                <flux:icon.arrow-left variant="micro" />
                Back to home
            </a>
            <a href="{{ URL::current() }}" class="inline-flex items-center gap-2 rounded-full border border-line bg-surface px-5 py-2.5 text-sm font-medium text-ink shadow-card transition hover:border-line-strong">
                <flux:icon.arrow-path variant="micro" />
                Try reloading
            </a>
        </div>
    </div>
</x-layouts.app>
