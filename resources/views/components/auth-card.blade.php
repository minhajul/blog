<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-slate-800">
    <div class="py-5 text-slate-500">
        {{ $logo }}
    </div>

    <div class="w-96 rounded-3xl mx-auto overflow-hidden shadow-xl">
        <div class="relative bg-red-500 h-48 rounded-bl-4xl">
            <svg class="absolute bottom-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#ffffff" fill-opacity="1" d="M0,64L48,80C96,96,192,128,288,128C384,128,480,96,576,85.3C672,75,768,85,864,122.7C960,160,1056,224,1152,245.3C1248,267,1344,245,1392,234.7L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
            </svg>
        </div>
        <div class="px-10 pt-4 pb-8 bg-white rounded-tr-4xl">
            {{ $slot }}
        </div>
    </div>
</div>
