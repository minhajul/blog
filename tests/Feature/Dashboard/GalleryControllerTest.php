<?php

declare(strict_types=1);

namespace Tests\Feature\Dashboard;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

final class GalleryControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_authenticated_user_can_view_gallery()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->get(route('gallery.index'));

        $response->assertStatus(200);
    }

    public function test_authenticated_user_can_view_gallery_create_page()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->get(route('gallery.create'));

        $response->assertStatus(200);
    }
}
