<?php

namespace Tests\Feature\Profile;

use Tests\TestCase;
use App\Models\User;
use App\Models\Subscriber;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SubscriberControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_user_can_view_setting()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->get(route('subscribers.index'));

        $response->assertStatus(200);
    }

    public function test_authenticated_user_can_delete_specific_subscriber()
    {
        $user = User::factory()->create();

        $subscriber = Subscriber::factory()->create();

        $response = $this->actingAs($user)
            ->delete(route('subscribers.delete', $subscriber));

        $response->assertRedirect();
        $response->assertSessionHasNoErrors();
    }
}
