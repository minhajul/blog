<x-layouts.app title="Experience">
    <x-page-header
        eyebrow="Career"
        title="Professional journey"
        lead="A chronological look at the teams I've worked with and the systems I've helped build along the way."
    />

    @if($experiences->isEmpty())
        <div class="card flex flex-col items-center px-6 py-16 text-center">
            <div class="grid size-12 place-items-center rounded-full bg-surface-raised text-ink-subtle">
                <flux:icon.briefcase />
            </div>
            <p class="mt-4 text-lg font-medium text-ink">Nothing here yet</p>
            <p class="mt-1 text-sm text-ink-muted">Work experience will be listed here soon.</p>
        </div>
    @else
        <ol class="relative max-w-4xl">
            @foreach($experiences as $experience)
                <li class="relative grid gap-4 pb-12 last:pb-0 sm:grid-cols-[11rem_1fr] sm:gap-10">
                    @unless($loop->last)
                        <span class="absolute top-0 bottom-0 left-[5px] w-px bg-line-strong sm:top-8 sm:left-[calc(13.5rem+5px)] sm:-bottom-8" aria-hidden="true"></span>
                    @endunless
                    <div class="pl-8 sm:pt-6 sm:pl-0 sm:text-right">
                        <p class="font-mono text-xs tracking-wide text-ink-subtle uppercase">
                            {{ $experience->workDuration }}
                        </p>
                        @if($experience->isCurrent())
                            <span class="mt-2 inline-flex items-center gap-1.5 rounded-full bg-emerald-500/10 px-2 py-0.5 text-xs font-medium text-emerald-700 dark:text-emerald-400">
                                <span class="size-1.5 rounded-full bg-emerald-500"></span>
                                Current
                            </span>
                        @endif
                    </div>

                    <div class="relative pl-8 sm:pl-10">
                        <span @class([
                            'absolute top-1 left-0 grid size-2.75 place-items-center rounded-full ring-4 ring-canvas sm:top-7',
                            'bg-primary' => $experience->isCurrent(),
                            'bg-line-strong' => ! $experience->isCurrent(),
                        ]) aria-hidden="true"></span>

                        <div class="card p-6">
                            <h2 class="text-lg font-semibold tracking-tight text-ink sm:text-xl">
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

                            <div class="article-content mt-5 !text-[0.9375rem] !leading-relaxed [&>*+*]:!mt-3">
                                {!! $experience->description !!}
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        </ol>
    @endif
</x-layouts.app>
