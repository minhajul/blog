<?php

declare(strict_types=1);

namespace Tests\Feature\Dashboard;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

final class InfoControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_unauthenticated_user_can_not_view_profile()
    {
        $response = $this->get(route('dashboard'));

        $response->assertRedirect();
    }

    public function test_authenticated_user_can_view_profile()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->get(route('dashboard'));

        $response->assertStatus(200);
    }

    public function test_authenticated_user_can_view_contact_page()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->get(route('contacts.index'));

        $response->assertStatus(200);
    }
}
