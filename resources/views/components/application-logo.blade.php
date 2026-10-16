<span {{ $attributes->class('inline-flex items-center gap-2.5') }}>
    <span class="grid size-8 place-items-center rounded-lg bg-ink font-serif text-lg italic leading-none text-canvas">
        {{ str(config('app.name'))->substr(0, 1)->upper() }}
    </span>
    <span class="text-base font-semibold tracking-tight text-ink">
        {{ config('app.name') }}
    </span>
</span>
