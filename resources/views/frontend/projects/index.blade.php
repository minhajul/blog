<x-layouts.app>
    <div class="py-6 lg:py-10">
        <flux:heading size="xl">Projects</flux:heading>
        <flux:subheading size="lg">Highlighted projects demonstrating my expertise</flux:subheading>

        <div class="mt-6 grid grid-cols-1 gap-4 sm:grid-cols-3 lg:grid-cols-1 xl:grid-cols-3">
            @foreach($projects as $project)
                <a href="{{ $project->url }}" target="_blank" class="bg-color rounded-md shadow-md p-4 mb-5">
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
