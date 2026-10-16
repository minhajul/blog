<div
    x-data="{ show: false, message: '', type: 'success', timeout: null }"
    x-on:show-message.window="show = true; message = $event.detail.message; type = $event.detail.type; clearTimeout(timeout); timeout = setTimeout(() => show = false, 3500)"
    x-show="show"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 translate-y-2 scale-95"
    x-transition:enter-end="opacity-100 translate-y-0 scale-100"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100 translate-y-0"
    x-transition:leave-end="opacity-0 translate-y-2"
    class="fixed right-4 bottom-4 z-50 w-[calc(100%-2rem)] max-w-sm"
    role="status"
    aria-live="polite"
    style="display: none;"
>
    <div class="flex items-start gap-3 rounded-xl border border-line bg-surface px-4 py-3 text-sm text-ink shadow-card-hover">
        <span
            class="mt-1.5 size-2 shrink-0 rounded-full"
            :class="{
                'bg-emerald-500': type === 'success',
                'bg-amber-500': type === 'warning',
                'bg-red-500': type === 'error'
            }"
        ></span>
        <span x-text="message" class="grow"></span>
        <button type="button" @click="show = false" class="-mr-1 text-ink-subtle transition hover:text-ink">
            <span class="sr-only">Dismiss</span>
            <flux:icon.x-mark variant="micro" />
        </button>
    </div>
</div>
