@props([
    'eyebrow' => null,
    'title',
    'lead' => null,
    'align' => 'left',
])

<header {{ $attributes->class([
    'max-w-3xl pt-16 pb-12 sm:pt-24 sm:pb-16 fadeInUp',
    'mx-auto text-center' => $align === 'center',
]) }}>
    @if($eyebrow)
        <p class="eyebrow mb-5">
            <span class="h-px w-6 bg-primary/50" aria-hidden="true"></span>
            {{ $eyebrow }}
        </p>
    @endif

    <h1 class="page-title">
        {{ $title }}
    </h1>

    @if($lead)
        <p @class(['page-lead mt-6', 'mx-auto max-w-2xl' => $align === 'center'])>
            {{ $lead }}
        </p>
    @endif

    {{ $slot }}
</header>
