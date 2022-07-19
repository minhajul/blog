<?php

namespace Tests\Feature\Profile;

use App\Models\Subscriber;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

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
