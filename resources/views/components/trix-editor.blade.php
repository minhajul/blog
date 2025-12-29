@props([
    'name' => null,
    'label' => null,
    'description' => null,
    'value' => '',
])

@php
    $wireModel = $attributes->whereStartsWith('wire:model')->first();
    $inputName = $name ?? 'trix_' . uniqid();
    $inputId = $inputName;
@endphp

<div class="space-y-2">
    @if ($label)
        <label for="{{ $inputId }}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
            {{ $label }}
        </label>
    @endif

    <input
        id="{{ $inputId }}"
        type="hidden"
        name="{{ $inputName }}"
        value="{!! old($inputName, $value) !!}"
    >

    @if($wireModel)
        <trix-editor
            input="{{ $inputId }}"
            wire:ignore
            class="bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-md p-2 trix-content"
            x-data="{ value: @entangle($wireModel) }"
            x-init="
                const trixEditor = $el;
                const hiddenInput = document.getElementById('{{ $inputId }}');
                let isUserTyping = false;

                trixEditor.addEventListener('trix-initialize', () => {
                    trixEditor.editor.loadHTML(value ?? '');
                });

                trixEditor.addEventListener('trix-change', (event) => {
                    isUserTyping = true;
                    value = event.target.value;
                    hiddenInput.value = event.target.value; // Also update hidden input for forms
                    setTimeout(() => { isUserTyping = false }, 150);
                });

                $watch('value', (newValue) => {
                    if (!isUserTyping) {
                        trixEditor.editor.loadHTML(newValue ?? '');
                    }
                });
            "
        ></trix-editor>
    @else
        <trix-editor
            input="{{ $inputId }}"
            class="bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-md p-2 trix-content"
        ></trix-editor>
    @endif

    @if ($description)
        <p class="text-xs text-gray-500 dark:text-gray-400">{{ $description }}</p>
    @endif

    @error($wireModel ?? $inputName)
    <div role="alert" class="flex items-center mt-2 text-sm font-medium text-red-500 dark:text-red-400">
{{--        <svg class="" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>--}}
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
        </svg>
        <span>{{ $message }}</span>
    </div>
    @enderror
</div>
