@props([
    'title',
    'description' => null,
])

<div {{ $attributes->class('flex flex-col gap-4 border-b border-line pb-6 sm:flex-row sm:items-end sm:justify-between') }}>
    <div>
        <h1 class="text-2xl font-semibold tracking-tight text-ink">{{ $title }}</h1>
        @if($description)
            <p class="mt-1 text-sm text-ink-muted">{{ $description }}</p>
        @endif
    </div>

    @isset($actions)
        <div class="flex shrink-0 items-center gap-2">
            {{ $actions }}
        </div>
    @endisset
</div>
