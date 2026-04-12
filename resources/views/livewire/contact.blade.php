<div class="py-6 px-4 overflow-hidden sm:px-6 lg:px-8 lg:py-10">
    <div class="max-w-4xl mx-auto text-center py-6 px-4 sm:py-10 sm:px-6 lg:px-8">
        <div class="grid place-items-center">
            <h1 class="text-4xl lg:text-5xl font-extrabold tracking-tighter text-on-surface mb-4 leading-none">
                Let's work together
            </h1>
            <p class="text-lg lg:text-xl text-on-surface-variant font-light leading-relaxed">
                I specialize in creating digital architectures that are as functional as they are beautiful. Have a
                vision? Let's build it.
            </p>
        </div>
    </div>

    <div class=" max-w-xl mx-auto">
        @include('errors.success')
        <form wire:submit="submit" class="grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-8">
            <div class="sm:col-span-2">
                <flux:input
                    type="text"
                    wire:model="name"
                    label="Name"
                    value="{{ old('name') }}"
                    autocomplete="name"
                    required="true"
                />
            </div>

            <div class="sm:col-span-2">
                <flux:input
                    type="email"
                    wire:model="email"
                    label="Email"
                    value="{{ old('email') }}"
                    autocomplete="email"
                    required="true"
                />
            </div>

            <div class="sm:col-span-2">
                <flux:textarea
                    label="Message"
                    wire:model="message"
                    rows="4"
                    required="true"
                    values="{{ old('email') }}"
                />
            </div>

            <div class="sm:col-span-2">
                <div class="float-right">
                    <flux:button type="submit" variant="primary">Submit</flux:button>
                </div>
            </div>
        </form>
    </div>
</div>
