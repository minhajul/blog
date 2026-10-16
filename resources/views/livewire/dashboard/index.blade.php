@php($stats = [
    ['label' => 'Blogs posted', 'value' => $analytics['posted_blog'], 'icon' => 'pencil-square'],
    ['label' => 'Published blogs', 'value' => $analytics['total_published_blog'], 'icon' => 'newspaper'],
    ['label' => 'Total reads', 'value' => $analytics['total_hit_count'], 'icon' => 'eye'],
])

<x-layouts.dashboard>
    <div class="card flex flex-col gap-6 p-6 sm:flex-row sm:items-center">
        <img src="{{ $user->avatarUrl() }}" alt="" class="size-20 shrink-0 rounded-2xl border border-line object-cover">
        <div>
            <p class="font-mono text-xs tracking-wider text-ink-subtle uppercase">Welcome back</p>
            <h1 class="mt-1 text-2xl font-semibold tracking-tight text-ink">{{ $user->name }}</h1>
            <p class="mt-0.5 text-sm text-ink-muted">Logged in as {{ $user->email }}</p>
        </div>
    </div>

    <div class="mt-4 grid gap-4 sm:grid-cols-3">
        @foreach($stats as $stat)
            <div class="card p-5">
                <div class="flex items-center justify-between text-ink-subtle">
                    <span class="text-sm font-medium text-ink-muted">{{ $stat['label'] }}</span>
                    <flux:icon :icon="$stat['icon']" variant="mini" />
                </div>
                <p class="mt-3 text-3xl font-semibold tracking-tight text-ink tabular-nums">{{ number_format($stat['value']) }}</p>
            </div>
        @endforeach
    </div>

    <div class="mt-6 space-y-3">
        @include('errors.error')
        @include('errors.success')
        @include('errors.message')
    </div>

    <section class="mt-10">
        <x-dashboard.heading title="Profile" description="Update your public name, photo and bio." />
        <div class="mt-6">
            <livewire:dashboard.profile.index/>
        </div>
    </section>

    <section class="mt-12">
        <x-dashboard.heading title="Password" description="Use a long, unique password to keep your account secure." />
        <div class="mt-6">
            <livewire:dashboard.profile.password/>
        </div>
    </section>
</x-layouts.dashboard>
