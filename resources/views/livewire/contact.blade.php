<div class="grid w-full gap-10 lg:grid-cols-12 lg:items-center lg:gap-12">
    <div class="lg:col-span-5 fadeInUp">
        <p class="eyebrow mb-4">
            Let's collaborate
        </p>
        <h1 class="text-3xl font-semibold tracking-tight text-balance text-ink sm:text-4xl sm:leading-[1.1]">
            Build something <span class="font-serif font-normal italic tracking-normal text-primary">together</span>
        </h1>
        <p class="page-lead mt-4">
            Whether you have a project in mind or just want to chat about ideas, I'm always open to connecting with fellow builders.
        </p>

        <ul class="mt-8 space-y-4">
            <li class="flex items-start gap-4">
                <span class="icon-tile">
                    <flux:icon.chat-bubble-left-right variant="mini" />
                </span>
                <div>
                    <p class="font-medium text-ink">Project inquiries</p>
                    <p class="text-sm text-ink-muted">Freelance, consulting or full-time roles.</p>
                </div>
            </li>
            <li class="flex items-start gap-4">
                <span class="icon-tile">
                    <flux:icon.clock variant="mini" />
                </span>
                <div>
                    <p class="font-medium text-ink">Quick turnaround</p>
                    <p class="text-sm text-ink-muted">I typically respond within 24–48 hours.</p>
                </div>
            </li>
        </ul>
    </div>

    <div class="lg:col-span-7 scale">
        <div class="card p-6 sm:p-8">
            @include('errors.success')

            <form wire:submit="submit" class="space-y-5">
                <div class="grid gap-5 sm:grid-cols-2">
                    <flux:input
                        type="text"
                        wire:model="name"
                        label="Name"
                        autocomplete="name"
                        required="true"
                        placeholder="Jane Doe"
                    />

                    <flux:input
                        type="email"
                        wire:model="email"
                        label="Email"
                        autocomplete="email"
                        required="true"
                        placeholder="jane@example.com"
                    />
                </div>

                <flux:textarea
                    label="Message"
                    wire:model="message"
                    rows="5"
                    required="true"
                    placeholder="Tell me about your project or idea…"
                />

                <div class="flex flex-col-reverse gap-4 pt-2 sm:flex-row sm:items-center sm:justify-between">
                    <p class="text-xs text-ink-subtle">Your details are only used to reply to you.</p>
                    <flux:button type="submit" variant="primary" icon:trailing="paper-airplane" class="w-full sm:w-auto">
                        Send message
                    </flux:button>
                </div>
            </form>
        </div>
    </div>
</div>
