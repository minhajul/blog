<?php

namespace Tests\Feature\Profile;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JsonException;
use Tests\TestCase;

class SettingsControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_authenticated_user_can_view_setting()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->get(route('settings.index'));

        $response->assertStatus(200);
    }

    /**
     * @throws JsonException
     */
    public function test_authenticated_user_can_update_setting()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->post(route('settings.update'), [
                'site_name' => $this->faker->name,
                'site_title' => $this->faker->title,
                'site_description' => $this->faker->paragraph,
            ]);

        $response->assertRedirect();
        $response->assertSessionHasNoErrors();
    }
}
