<?php

use App\Models\Blog;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

describe('Blog Model', function () {
    it('generates slug automatically from title', function () {
        $blog = Blog::factory()->create([
            'title' => 'My First Blog Post',
        ]);

        expect($blog->slug)->toBe('my-first-blog-post');
    });

    it('appends numeric suffix when slug already exists', function () {
        Blog::factory()->create([
            'title' => 'Duplicate Blog',
        ]);

        $blog = Blog::factory()->create([
            'title' => 'Duplicate Blog',
        ]);

        expect($blog->slug)->toBe('duplicate-blog-2');
    });

    it('determines blog status correctly', function () {
        $published = Blog::factory()->make(['status' => 'published']);
        $drafted   = Blog::factory()->make(['status' => 'drafted']);
        $archived  = Blog::factory()->make(['status' => 'archived']);

        expect($published->isPublished())->toBeTrue()
            ->and($published->isDrafted())->toBeFalse()
            ->and($drafted->isDrafted())->toBeTrue()
            ->and($archived->isArchived())->toBeTrue();
    });

    it('marks blog as archived', function () {
        $blog = Blog::factory()->create([
            'status' => 'published',
        ]);

        $blog->markAsArchived();

        expect($blog->fresh()->status)->toBe('archived');
    });

    it('returns only published blogs using published scope', function () {
        Blog::factory()->count(2)->create(['status' => 'published']);
        Blog::factory()->count(3)->create(['status' => 'drafted']);

        $blogs = Blog::published()->get();

        expect($blogs)->toHaveCount(2)
            ->each(fn ($blog) =>
            expect($blog->status)->toBe('published')
            );
    });

    it('returns only drafted blogs using drafted scope', function () {
        Blog::factory()->count(2)->create(['status' => 'drafted']);
        Blog::factory()->count(1)->create(['status' => 'archived']);

        expect(Blog::drafted()->count())->toBe(2);
    });

    it('returns only archived blogs using archived scope', function () {
        Blog::factory()->count(3)->create(['status' => 'archived']);
        Blog::factory()->count(2)->create(['status' => 'published']);

        expect(Blog::archived()->count())->toBe(3);
    });
});
