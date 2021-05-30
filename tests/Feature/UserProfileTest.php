<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserProfileTest extends TestCase
{
    use RefreshDatabase;

    public function test_unauthenticated_user_can_not_view_profile()
    {
        $response = $this->get(route('profile.index'));

        $response->assertRedirect();
    }

    public function test_authenticated_user_without_company_id_can_not_view_profile()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->get(route('profile.index'));

        $response->assertStatus(500);
    }
}
