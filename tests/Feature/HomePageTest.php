<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HomePageTest extends TestCase
{
    use RefreshDatabase;

    public function test_home_page_is_visible()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
