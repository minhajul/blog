<div
    x-data
    class="flex items-center mr-2">
    <button
        @click="$flux.appearance = $flux.appearance === 'dark' ? 'light' : 'dark'"
        class="cursor-pointer text-gray-600 dark:text-gray-300 transition-colors"
        title="Toggle Light/Dark"
    >
        <template x-if="$flux.appearance === 'dark'">
            <flux:icon.moon variant="micro" />
        </template>

        <template x-if="$flux.appearance === 'light' || $flux.appearance === 'system'">
            <flux:icon.sun variant="micro" />
        </template>
    </button>
</div>
