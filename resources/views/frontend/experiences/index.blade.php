<x-layouts.app>
    <div class="py-6 lg:py-10">
        <div class="max-w-4xl mx-auto text-center py-6 sm:py-10">
            <div class="grid place-items-center">
                <h1 class="text-4xl lg:text-5xl font-extrabold tracking-tighter text-on-surface mb-4 leading-none">
                    Professional Trajectory
                </h1>
                <p class="text-lg lg:text-xl text-on-surface-variant font-light leading-relaxed">
                    A chronological breakdown of my journey through architectural software design and engineering leadership.
                </p>
            </div>
        </div>

        <div class="mt-10 relative border-l-2 border-blue-400 ml-3 space-y-8">
            @foreach($experiences as $experience)
                <div class="relative pl-6 md:pl-8">
                    <span class="absolute -left-2.75 top-0 h-5 w-5 rounded-full bg-blue-400"></span>
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-1">
                        <h3 class="text-xl lg:text-2xl font-bold text-color tracking-wide">
                            {{ $experience->title }}
                        </h3>
                    </div>

                    <div class="text-lg font-medium text-color mb-2">
                        {{ $experience->company_name }}
                    </div>

                    <div class="text-sm font-mono text-surface uppercase tracking-wider mb-3">
                        {{ $experience->workDuration  }}
                    </div>

                    <div class="space-y-3 text-surface leading-relaxed">
                        {!! $experience->description !!}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layouts.app>
