<button
    x-data
    type="button"
    @click="$flux.appearance = $flux.appearance === 'dark' ? 'light' : 'dark'"
    {{ $attributes->class('icon-button') }}
    title="Toggle theme"
    aria-label="Toggle theme"
>
    <flux:icon.moon variant="mini" class="hidden dark:block" />
    <flux:icon.sun variant="mini" class="block dark:hidden" />
</button>
