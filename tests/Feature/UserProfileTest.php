<?php

namespace Tests\Feature;

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
}
