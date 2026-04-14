<x-layouts.app>
    <div class="py-6 lg:py-10">
        <div class="max-w-4xl mx-auto text-center py-6 px-4 sm:py-10 sm:px-6 lg:px-8">
            <div class="grid place-items-center">
                <h1 class="text-4xl lg:text-5xl font-extrabold tracking-tighter text-on-surface mb-4 leading-none">
                    Curated Projects & Technical Prototypes.
                </h1>
                <p class="text-lg lg:text-xl text-on-surface-variant font-light leading-relaxed">
                    Exploring the intersection of geometric structural design and performant software engineering.
                </p>
            </div>
        </div>

        <div class="mt-6 grid grid-cols-1 gap-6 sm:gap-7 md:gap-8 sm:grid-cols-3 lg:grid-cols-1 xl:grid-cols-3">
            @foreach($projects as $project)
                <a href="{{ $project->url }}" target="_blank" class="bg-surface-muted ring-1 ring-white/5 rounded-2xl shadow-md p-4 mb-5">
                    <div class="flex justify-between items-center">
                        <p class="text-xl font-medium tracking-tight text-color">
                            {{ $project->title }}
                        </p>
                    </div>

                    <div class="flex space-x-2 py-3">
                        @foreach($project->technologies as $tech)
                        <p class="text-xs text-color bg-color px-2 py-1 rounded-md">
                            {{ $tech }}
                        </p>
                        @endforeach
                    </div>

                    <p class="text-sm text-color">
                        {{ $project->description }}
                    </p>
                </a>
            @endforeach
        </div>
    </div>
</x-layouts.app>
