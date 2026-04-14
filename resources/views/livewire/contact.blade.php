<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="w-full max-w-3xl">
        <div class="text-center mb-12">
            <span class="inline-block py-1 bg-secondary-container text-on-secondary-container rounded-full text-xs font-bold tracking-widest uppercase mb-4">
                Let's collaborate
            </span>
            <h1 class="text-4xl lg:text-5xl font-extrabold tracking-tighter text-on-surface mb-4 leading-none">
                Build something together
            </h1>
            <p class="text-lg lg:text-xl text-on-surface-variant font-light leading-relaxed max-w-lg mx-auto">
                Whether you have a project in mind or just want to chat about ideas, I'm always open to connecting with fellow builders.
            </p>
        </div>

        <div class="bg-surface-muted rounded-2xl shadow-md p-6 sm:p-8 ring-1 ring-white/5">
            @include('errors.success')
            <form wire:submit="submit" class="space-y-5">
                <div>
                    <flux:input
                        type="text"
                        wire:model="name"
                        label="Name"
                        value="{{ old('name') }}"
                        autocomplete="name"
                        required="true"
                        placeholder="Your name"
                    />
                </div>

                <div>
                    <flux:input
                        type="email"
                        wire:model="email"
                        label="Email"
                        value="{{ old('email') }}"
                        autocomplete="email"
                        required="true"
                        placeholder="your@email.com"
                    />
                </div>

                <div>
                    <flux:textarea
                        label="Message"
                        wire:model="message"
                        rows="4"
                        required="true"
                        values="{{ old('email') }}"
                        placeholder="Tell me about your project or idea..."
                    />
                </div>

                <div class="pt-2">
                    <flux:button type="submit" variant="primary" class="w-full sm:w-auto">
                        Send message
                    </flux:button>
                </div>
            </form>
        </div>

        <p class="text-center text-sm text-on-surface-variant/60 mt-8">
            I typically respond within 24-48 hours
        </p>
    </div>
</div>
