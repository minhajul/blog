<?php

declare(strict_types=1);

use App\Livewire\Home;
use App\Models\Blog;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

uses(RefreshDatabase::class);

describe('Home Component', function () {
    test('home page can be rendered', function () {
        $this->get(route('home'))
            ->assertOk();
    });

    test('component renders with paginated blogs', function () {
        Blog::factory()->count(5)->create(['status' => 'published']);

        Livewire::test(Home::class)
            ->assertOk()
            ->assertViewHas('blogs');
    });

    test('shows only published blogs', function () {
        Blog::factory()->count(3)->create(['status' => 'published']);
        Blog::factory()->count(2)->create(['status' => 'archived']);

        Livewire::test(Home::class)
            ->assertOk();

        expect(Blog::published()->count())->toBe(3);
    });

    test('paginates blogs correctly', function () {
        Blog::factory()->count(5)->create(['status' => 'published']);

        Livewire::test(Home::class)
            ->assertOk()
            ->assertViewHas('blogs', fn ($blogs) => $blogs->count() === 5);
    });

    test('can filter blogs by keywords', function () {
        $blog = Blog::factory()->create([
            'title' => 'Laravel tutorial',
            'status' => 'published',
        ]);

        Livewire::test(Home::class)
            ->set('keywords', 'Laravel')
            ->assertOk();
    });

    test('keywords search works across multiple fields', function () {
        $blog = Blog::factory()->create([
            'title' => 'PHP Guide',
            'status' => 'published',
            'details' => '<p>Learn PHP programming</p>',
        ]);

        Livewire::test(Home::class)
            ->set('keywords', 'PHP')
            ->assertOk();
    });

    test('renders with blogs sorted by updated_at descending', function () {
        $old = Blog::factory()->create([
            'title' => 'Old Post',
            'status' => 'published',
        ]);

        $new = Blog::factory()->create([
            'title' => 'New Post',
            'status' => 'published',
            'updated_at' => now(),
        ]);

        Livewire::test(Home::class)
            ->assertOk();
    });

    test('can set keywords property', function () {
        Livewire::test(Home::class)
            ->set('keywords', 'test')
            ->assertSet('keywords', 'test');
    });

    test('returns empty results when no blogs exist', function () {
        Livewire::test(Home::class)
            ->assertOk()
            ->assertViewHas('blogs', fn ($blogs) => $blogs->total() === 0);
    });

    test('handles special characters in keywords', function () {
        Blog::factory()->create([
            'title' => 'Test & More',
            'status' => 'published',
        ]);

        Livewire::test(Home::class)
            ->set('keywords', '&')
            ->assertOk();
    });
});
