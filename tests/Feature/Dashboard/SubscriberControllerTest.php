<?php

declare(strict_types=1);

namespace Tests\Feature\Dashboard;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

final class SubscriberControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_user_can_view_setting()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->get(route('subscribers.index'));

        $response->assertStatus(200);
    }
}
