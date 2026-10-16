@props([
    'icon',
    'title',
    'description' => null,
])

<div {{ $attributes->class('card flex flex-col items-center px-6 py-16 text-center') }}>
    <div class="grid size-12 place-items-center rounded-full bg-surface-raised text-ink-subtle">
        <flux:icon :icon="$icon" />
    </div>
    <p class="mt-4 font-medium text-ink">{{ $title }}</p>
    <p class="mt-1 text-sm text-ink-muted">{{ $description ?? $slot }}</p>
</div>
