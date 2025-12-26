<div
    x-data
    class="flex items-center bg-red-600 mr-2">
    <button
        @click="$flux.appearance = $flux.appearance === 'dark' ? 'light' : 'dark'"
        class="cursor-pointer text-black transition-colors"
        title="Toggle Light/Dark"
    >
        <template x-if="$flux.appearance === 'dark'">
            <flux:icon.moon variant="micro" />
        </template>

{{--        <template x-if="$flux.appearance === 'light' || $flux.appearance === 'system'">--}}
        <template>
            <flux:icon.sun variant="micro" />
        </template>
    </button>
</div>
