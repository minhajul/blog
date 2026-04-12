<x-layouts.app>
    <div class="py-6 lg:py-10">
        <div class="min-h-screen flex items-center justify-center">
            <div class="py-6 overflow-hidden lg:py-10">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">
                    <div class="lg:col-span-4 xl:col-span-3">
                        <div class="relative group max-w-xs mx-auto lg:max-w-none">
                            <div class="absolute -inset-1 bg-primary/20 rounded-full blur-2xl group-hover:bg-primary/30 transition duration-1000"></div>
                            <div class="relative aspect-square rounded-full overflow-hidden border-4 border-surface-container-lowest shadow-xl max-w-64 mx-auto">
                                <img alt="Software Engineer Portrait" class="w-full h-full object-cover"
                                     data-alt="Profile Pic"
                                     src="{{ $user->avatarUrl() ?? 'https://placehold.co/150x150' }}"
                                />
                            </div>
                        </div>
                    </div>
                    <div class="lg:col-span-8 xl:col-span-9 space-y-5">
                        <div>
                            <span class="inline-block py-1 bg-secondary-container text-on-secondary-container rounded-full text-xs font-bold tracking-widest uppercase mb-3">
                                Available for work
                            </span>
                            <x-typewriter
                                :phrases="$typewriterText"
                                class="block text-4xl lg:text-6xl font-black tracking-tight text-on-surface"
                            />
                            <p class="mt-2 text-xl md:text-2xl font-medium text-on-surface-variant italic">
                                Software Engineer &amp; Technical Architect
                            </p>
                        </div>
                        <p class="text-base md:text-lg leading-relaxed text-on-surface-variant">
                            {!! $user->bio !!}
                        </p>
                        <div class="pt-2">
                            <a href="#" class="group inline-flex items-center gap-2 text-primary font-semibold hover:gap-3 transition-all duration-300">
                                <span class="material-symbols-outlined" data-icon="download">Download CV</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="py-10 mt-10">
                    <div class="text-center mb-10">
                        <h2 class="font-semibold text-color text-2xl lg:text-4xl mb-3">
                            Skills & Expertise
                        </h2>
                        <div class="h-1 w-32 bg-linear-to-r from-blue-400 to-teal-600 mx-auto rounded-full"></div>
                        <p class="text-xl text-surface max-w-3xl mx-auto">
                            Technologies and tools I use to bring ideas to life
                        </p>
                    </div>

                    <div class="grid gap-6 sm:gap-7 md:gap-8 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
                        @foreach($skills as $skill)
                            <div class="group will-reveal rounded-2xl p-4 bg-surface ring-1 ring-white/10 overflow-hidden">
                                <h3 class="text-lg font-semibold text-color">{{ $skill['title'] }}</h3>
                                <p class="text-xs text-surface">{{ $skill['description'] }}</p>

                                <div class="mt-5 flex flex-wrap gap-2">
                                    @foreach($skill['technologies'] as $technology)
                                        <span class="{{ $technology['colorCode'] }} px-2 py-1.5 rounded-full text-sm text-nowrap">
                                            {{ $technology['name'] }}
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="max-w-full lg:max-w-2xl mx-auto text-center mt-10">
                        <p class="border border-blue-400 p-1 rounded-md text-surface">
                            Always learning and exploring new technologies
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
