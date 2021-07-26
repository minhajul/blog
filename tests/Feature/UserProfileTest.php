<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserProfileTest extends TestCase
{
    use RefreshDatabase;

    public function test_unauthenticated_user_can_not_view_profile()
    {
        $response = $this->get(route('profile.index'));

        $response->assertRedirect();
    }

    public function test_authenticated_user_can_view_profile()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->get(route('profile.index'));

        $response->assertStatus(200);
    }
}
