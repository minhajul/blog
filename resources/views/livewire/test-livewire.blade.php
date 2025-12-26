<div class="max-w-2.5 mx-auto">
    <p>Count: {{ $count }}</p>

    <button wire:click="increment">
        Increment
    </button>

    <div x-data="{ count: 0 }">
        <button @click="count++">+</button>
        <span x-text="count"></span>
    </div>
</div>
