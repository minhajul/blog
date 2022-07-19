<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_contact_screen_can_be_rendered()
    {
        $response = $this->get(route('contact.index'));

        $response->assertStatus(200);
    }

    public function test_user_can_submit_contact()
    {
        $response = $this->post(route('contact.store'), [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'message' => 'Test Contact Message',
        ]);

        $response->assertRedirect();
        $response->assertSessionHasNoErrors();
    }
}
