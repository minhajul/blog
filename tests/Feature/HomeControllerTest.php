<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HomeControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_home_page_is_visible()
    {
        $response = $this->get(route('home'));

        $response->assertStatus(200);
    }
}
