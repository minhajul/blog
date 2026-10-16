<button
    x-data
    type="button"
    @click="$flux.appearance = $flux.appearance === 'dark' ? 'light' : 'dark'"
    {{ $attributes->class('inline-grid size-9 cursor-pointer place-items-center rounded-full text-ink-muted transition hover:bg-surface-raised hover:text-ink') }}
    title="Toggle theme"
    aria-label="Toggle theme"
>
    <flux:icon.moon variant="mini" class="hidden dark:block" />
    <flux:icon.sun variant="mini" class="block dark:hidden" />
</button>
