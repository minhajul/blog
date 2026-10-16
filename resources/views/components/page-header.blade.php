@props([
    'eyebrow' => null,
    'title',
    'lead' => null,
    'align' => 'left',
])

<header {{ $attributes->class([
    'max-w-3xl pt-12 pb-10 sm:pt-16 sm:pb-12 fadeInUp',
    'mx-auto text-center' => $align === 'center',
]) }}>
    @if($eyebrow)
        <p class="eyebrow mb-4">
            {{ $eyebrow }}
        </p>
    @endif

    <h1 class="page-title">
        {{ $title }}
    </h1>

    @if($lead)
        <p @class(['page-lead mt-4', 'mx-auto max-w-2xl' => $align === 'center'])>
            {{ $lead }}
        </p>
    @endif

    {{ $slot }}
</header>
