<div
    x-data
    class="flex items-center"
>
    <button
        @click="$flux.appearance = $flux.appearance === 'dark' ? 'light' : 'dark'"
        class="p-2 rounded-md text-surface hover:bg-neutral-200 dark:hover:bg-neutral-800"
        title="Toggle theme"
    >
        <template x-if="$flux.appearance === 'dark'">
            <flux:icon.moon variant="micro" />
        </template>

        <template x-if="$flux.appearance !== 'dark'">
            <flux:icon.sun variant="micro" />
        </template>
    </button>
</div>
