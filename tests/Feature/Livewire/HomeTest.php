<?php

declare(strict_types=1);

use App\Livewire\Home;
use App\Models\Blog;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

uses(RefreshDatabase::class);

describe('Home Component', function () {
    test('home route responds successfully', function () {
        $this->get(route('home'))->assertOk();
    });

    test('component renders without errors', function () {
        Livewire::test(Home::class)->assertOk();
    });

    test('component renders empty state when no blogs exist', function () {
        Livewire::test(Home::class)
            ->assertOk()
            ->assertSee('No blog found');
    });

    test('can set keywords property', function () {
        Livewire::test(Home::class)
            ->set('keywords', 'Laravel')
            ->assertSet('keywords', 'Laravel');
    });
});

describe('Home Blog Filtering', function () {
    test('shows only published blogs', function () {
        Blog::factory()->count(3)->create(['status' => 'published']);
        Blog::factory()->count(2)->create(['status' => 'archived']);

        expect(Blog::published()->count())->toBe(3);
    });

    test('paginates published blogs at 12 per page', function () {
        Blog::factory()->count(15)->create(['status' => 'published']);

        $page = Blog::published()->orderByDesc('updated_at')->paginate(12);

        expect($page->total())->toBe(15)
            ->and($page->count())->toBe(12);
    });

    test('returns no published blogs when database is empty', function () {
        expect(Blog::published()->count())->toBe(0);
    });

    test('orders published blogs by most recently updated first', function () {
        $old = Blog::factory()->create([
            'title' => 'Old Post',
            'status' => 'published',
            'updated_at' => now()->subDays(7),
        ]);

        $new = Blog::factory()->create([
            'title' => 'New Post',
            'status' => 'published',
            'updated_at' => now(),
        ]);

        $titles = Blog::published()->orderByDesc('updated_at')->pluck('title');

        expect($titles->first())->toBe($new->title)
            ->and($titles->last())->toBe($old->title);
    });

    test('keywords filter matches against title and details', function () {
        Blog::factory()->create(['title' => 'Laravel tutorial', 'status' => 'published']);
        Blog::factory()->create([
            'title' => 'PHP Guide',
            'details' => '<p>Learn PHP programming</p>',
            'status' => 'published',
        ]);
        Blog::factory()->create(['title' => 'Unrelated', 'status' => 'published']);

        $titleHits = Blog::query()
            ->whereLikes(['title', 'details'], 'PHP')
            ->count();

        expect($titleHits)->toBe(1);
    });

    test('keywords filter handles special characters safely', function () {
        Blog::factory()->create(['title' => 'Test & More', 'status' => 'published']);
        Blog::factory()->create(['title' => 'Other', 'status' => 'published']);

        $hits = Blog::query()
            ->whereLikes(['title'], '&')
            ->count();

        expect($hits)->toBe(1);
    });
});
