<x-layouts.app>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-6 lg:py-10">
        <flux:heading size="xl">Experiences</flux:heading>
        <flux:subheading size="lg">List of my professional experiences</flux:subheading>

        <div class="mt-10 relative border-l-2 border-blue-400 ml-3 space-y-8">
            @foreach($experiences as $experience)
                <div class="relative pl-6 md:pl-8">
                    <span class="absolute -left-[11px] top-0 h-5 w-5 rounded-full bg-blue-400"></span>
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-1">
                        <h3 class="text-2xl font-bold text-color tracking-wide">
                            {{ $experience->title }}
                        </h3>
                    </div>

                    <div class="text-lg font-medium text-color mb-2">
                        {{ $experience->company_name }}
                    </div>

                    <div class="text-sm font-mono text-surface uppercase tracking-wider mb-3">
                        {{ $experience->start_date->format('M Y') }}
                        &mdash;
                        {{ $experience->end_date ? $experience->end_date->format('M Y') : 'Running' }}
                    </div>

                    <div class="space-y-3 text-surface leading-relaxed">
                        {!! $experience->description !!}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layouts.app>
