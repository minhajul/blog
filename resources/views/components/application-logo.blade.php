<span {{ $attributes->class('inline-flex items-center gap-2.5') }}>
    <span class="grid size-7 place-items-center rounded-lg bg-ink font-serif text-base italic leading-none text-canvas">
        {{ str(config('app.name'))->substr(0, 1)->upper() }}
    </span>
    <span class="text-[0.9375rem] font-semibold tracking-tight text-ink">
        {{ config('app.name') }}
    </span>
</span>
