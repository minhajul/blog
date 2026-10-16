@php($skillIcons = [
    'Frontend' => 'computer-desktop',
    'Backend' => 'server-stack',
    'DevOps' => 'arrow-path',
    'Databases' => 'circle-stack',
    'Cloud' => 'cloud',
])

<x-layouts.app title="About">
    <section class="grid items-center gap-10 pt-12 pb-16 sm:pt-16 lg:grid-cols-12 lg:gap-12">
        <div class="order-2 lg:order-1 lg:col-span-7 fadeInUp">
            <p class="inline-flex items-center gap-2 rounded-full border border-line bg-surface px-3 py-1 text-xs font-medium text-ink-muted shadow-card">
                <span class="relative flex size-2">
                    <span class="absolute inline-flex size-full animate-ping rounded-full bg-emerald-400 opacity-60 motion-reduce:hidden"></span>
                    <span class="relative inline-flex size-2 rounded-full bg-emerald-500"></span>
                </span>
                Available for work
            </p>

            <x-typewriter
                :phrases="$typewriterText"
                class="mt-5 block min-h-[2.4em] text-3xl font-semibold tracking-tight text-ink sm:min-h-[1.2em] sm:text-4xl lg:text-5xl"
            />

            <p class="mt-2 font-serif text-xl italic text-primary sm:text-2xl">
                Software Engineer &amp; Technical Architect
            </p>

            <div class="mt-6 max-w-2xl space-y-3 text-base leading-relaxed text-ink-muted">
                {!! $user->bio !!}
            </div>

            <div class="mt-8 flex flex-wrap items-center gap-3">
                <a href="#" class="inline-flex items-center gap-2 rounded-full bg-ink px-4 py-2 text-sm font-medium text-canvas transition hover:opacity-90">
                    <flux:icon.arrow-down-tray variant="micro" />
                    Download CV
                </a>
                <a href="{{ route('contact') }}" wire:navigate class="inline-flex items-center gap-2 rounded-full border border-line bg-surface px-4 py-2 text-sm font-medium text-ink shadow-card transition hover:border-line-strong">
                    Get in touch
                    <flux:icon.arrow-right variant="micro" />
                </a>
            </div>
        </div>

        <div class="order-1 lg:order-2 lg:col-span-5 scale">
            <div class="relative mx-auto max-w-60 lg:max-w-xs">
                <div class="absolute -inset-4 rounded-[2.5rem] bg-linear-to-br from-brand-400/30 via-brand-200/10 to-transparent blur-2xl dark:from-brand-500/25" aria-hidden="true"></div>
                <div class="relative rotate-2 overflow-hidden rounded-[2rem] border border-line bg-surface p-2 shadow-card-hover transition duration-500 hover:rotate-0">
                    <img alt="Portrait of {{ $user->name }}" class="aspect-square w-full rounded-[1.5rem] object-cover"
                         src="{{ $user->avatarUrl() }}"
                    />
                </div>
            </div>
        </div>
    </section>

    <section class="border-t border-line pt-16">
        <div class="max-w-2xl">
            <p class="eyebrow">
                <span class="h-px w-6 bg-primary/50" aria-hidden="true"></span>
                Toolbox
            </p>
            <h2 class="mt-3 text-2xl font-semibold tracking-tight text-ink sm:text-3xl">
                Skills &amp; expertise
            </h2>
            <p class="mt-3 text-base text-ink-muted">
                Technologies and tools I use to bring ideas to life.
            </p>
        </div>

        <div class="mt-8 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
            @foreach($skills as $skill)
                <div class="card p-5">
                    <div class="flex items-start gap-3.5">
                        <div class="grid size-10 shrink-0 place-items-center rounded-xl bg-primary-soft text-primary">
                            <flux:icon :icon="$skillIcons[$skill['title']] ?? 'sparkles'" variant="mini" />
                        </div>
                        <div>
                            <h3 class="font-semibold text-ink">{{ $skill['title'] }}</h3>
                            <p class="mt-0.5 text-sm text-ink-muted">{{ $skill['description'] }}</p>
                        </div>
                    </div>

                    <ul class="mt-5 flex flex-wrap gap-1.5">
                        @foreach($skill['technologies'] as $technology)
                            <li class="chip">{{ $technology['name'] }}</li>
                        @endforeach
                    </ul>
                </div>
            @endforeach

            <div class="flex flex-col justify-center rounded-2xl border border-dashed border-line-strong p-5">
                <flux:icon.light-bulb class="text-ink-subtle" />
                <p class="mt-3 font-serif text-xl italic text-ink">Always learning.</p>
                <p class="mt-1 text-sm text-ink-muted">Exploring new technologies, one side project at a time.</p>
            </div>
        </div>
    </section>
</x-layouts.app>
