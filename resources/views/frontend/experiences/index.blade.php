<x-layouts.app title="Experience">
    <x-page-header
        eyebrow="Career"
        title="Professional journey"
        lead="A chronological look at the teams I've worked with and the systems I've helped build along the way."
    />

    @if($experiences->isEmpty())
        <x-empty-state icon="briefcase" title="Nothing here yet" description="Work experience will be listed here soon." />
    @else
        <ol class="relative max-w-4xl [--col-gap:2.5rem] [--date-col:11rem]">
            @foreach($experiences as $experience)
                <li class="relative grid gap-3 pb-8 last:pb-0 sm:grid-cols-[var(--date-col)_1fr] sm:gap-(--col-gap)">
                    @unless($loop->last)
                        <span class="absolute top-0 bottom-0 left-[5px] w-px bg-line-strong sm:top-8 sm:left-[calc(var(--date-col)+var(--col-gap)+5px)] sm:-bottom-8" aria-hidden="true"></span>
                    @endunless
                    <div class="pl-8 sm:pt-6 sm:pl-0 sm:text-right">
                        <p class="label-mono">
                            {{ $experience->workDuration }}
                        </p>
                        @if($experience->isCurrent())
                            <flux:badge size="sm" color="green" class="mt-2">Current</flux:badge>
                        @endif
                    </div>

                    <div class="relative pl-8 sm:pl-10">
                        <span @class([
                            'absolute top-1 left-0 size-2.75 rounded-full ring-4 ring-canvas sm:top-7',
                            'bg-primary' => $experience->isCurrent(),
                            'bg-line-strong' => ! $experience->isCurrent(),
                        ]) aria-hidden="true"></span>

                        <div class="card p-5">
                            <h2 class="text-base font-semibold tracking-tight text-ink sm:text-lg">
                                {{ $experience->title }}
                            </h2>
                            <p class="mt-1 inline-flex items-center gap-1.5 text-sm font-medium text-primary">
                                <flux:icon.building-office-2 variant="micro" />
                                @if($experience->company_website)
                                    <a href="{{ $experience->company_website }}" target="_blank" rel="noopener noreferrer" class="hover:underline underline-offset-4">
                                        {{ $experience->company_name }}
                                    </a>
                                @else
                                    {{ $experience->company_name }}
                                @endif
                            </p>

                            <div class="article-content article-content-compact mt-4">
                                {!! $experience->description !!}
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        </ol>
    @endif
</x-layouts.app>
