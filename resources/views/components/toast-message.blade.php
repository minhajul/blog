<div
    x-data="{ show: false, message: '', type: 'success' }"
    x-on:show-message.window="show = true; message = $event.detail.message; type = $event.detail.type; setTimeout(() => show = false, 3000)"
    x-show="show"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 transform translate-y-2"
    x-transition:enter-end="opacity-100 transform translate-y-0"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100 transform translate-y-0"
    x-transition:leave-end="opacity-0 transform translate-y-2"
    class="fixed bottom-4 right-4 z-50"
    style="display: none;"
>
    <div
        :class="{
                'bg-green-100 border-green-400 text-green-700': type === 'success',
                'bg-yellow-100 border-yellow-400 text-yellow-700': type === 'warning',
                'bg-red-100 border-red-400 text-red-700': type === 'error'
            }"
        class="border px-4 py-3 rounded shadow-lg"
    >
        <span x-text="message"></span>
    </div>
</div>
