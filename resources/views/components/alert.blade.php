@props([
    'type' => 'success',
    'icon' => null,
])

@php
    $isSuccess = $type === 'success';
    $icon ??= $isSuccess ? 'check-circle' : 'exclamation-triangle';
@endphp

<div role="alert" {{ $attributes->class([
    'flex items-start gap-3 rounded-xl border px-4 py-3 text-sm',
    'border-emerald-500/20 bg-emerald-500/10 text-emerald-800 dark:text-emerald-300' => $isSuccess,
    'border-red-500/20 bg-red-500/10 text-red-800 dark:text-red-300' => ! $isSuccess,
]) }}>
    <flux:icon :icon="$icon" variant="mini" class="mt-px shrink-0" />
    <div>{{ $slot }}</div>
</div>
