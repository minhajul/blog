<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-slate-800">
    <div class="py-5 text-slate-500">
        {{ $logo }}
    </div>

    <div class="w-96 rounded-3xl mx-auto overflow-hidden shadow-xl">
        <div class="px-10 py-8 bg-white/90">
            {{ $slot }}
        </div>
    </div>
</div>
