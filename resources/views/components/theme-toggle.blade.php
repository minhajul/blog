<div
    x-data
    class="flex items-center"
>
    <button
        @click="$flux.appearance = $flux.appearance === 'dark' ? 'light' : 'dark'"
        class="px-2 cursor-pointer rounded-md text-surface"
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
