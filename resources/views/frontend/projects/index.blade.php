<x-layouts.app title="Projects">
    <x-page-header
        eyebrow="Selected work"
        title="Projects & technical prototypes"
        lead="Things I've designed, built and shipped — from production systems to weekend experiments."
    />

    @if($projects->isEmpty())
        <div class="card flex flex-col items-center px-6 py-16 text-center">
            <div class="grid size-12 place-items-center rounded-full bg-surface-raised text-ink-subtle">
                <flux:icon.folder-open />
            </div>
            <p class="mt-4 text-lg font-medium text-ink">No projects yet</p>
            <p class="mt-1 text-sm text-ink-muted">Projects will show up here once they're published.</p>
        </div>
    @else
        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
            @foreach($projects as $project)
                <a href="{{ $project->url }}" target="_blank" rel="noopener noreferrer"
                   class="group flex flex-col card-interactive p-5">
                    <div class="flex items-center justify-between">
                        <span class="font-mono text-xs text-ink-subtle">{{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                        <span class="grid size-8 place-items-center rounded-full border border-line text-ink-subtle transition group-hover:border-primary group-hover:bg-primary group-hover:text-white">
                            <flux:icon.arrow-up-right variant="micro" />
                        </span>
                    </div>

                    <h2 class="mt-4 text-base font-semibold tracking-tight text-ink transition-colors group-hover:text-primary">
                        {{ $project->title }}
                    </h2>

                    @if($host = parse_url((string) $project->url, PHP_URL_HOST))
                        <p class="mt-1 font-mono text-xs text-ink-subtle">{{ str($host)->after('www.') }}</p>
                    @endif

                    <p class="mt-3 line-clamp-3 text-sm leading-relaxed text-ink-muted">
                        {{ $project->short_description }}
                    </p>

                    @if(filled($project->technologies))
                        <ul class="mt-auto flex flex-wrap gap-1.5 pt-5">
                            @foreach($project->technologies as $tech)
                                <li class="chip">{{ $tech }}</li>
                            @endforeach
                        </ul>
                    @endif
                </a>
            @endforeach
        </div>
    @endif
</x-layouts.app>
