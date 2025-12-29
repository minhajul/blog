<div class="py-6 px-4 overflow-hidden sm:px-6 lg:px-8 lg:py-10">
    <div class="relative max-w-xl mx-auto">
        <div class="text-center">
            <flux:heading size="xl">Contact Us</flux:heading>
            <flux:subheading size="lg">
                Nullam risus blandit ac aliquam justo ipsum. Quam mauris volutpat massa dictumst amet. Sapien tortor lacus arcu.
            </flux:subheading>
        </div>

        <div class="mt-12">
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
</div>
