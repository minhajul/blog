<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AboutControllerTest extends TestCase
{
    public function test_about_page_is_visible()
    {
        $response = $this->get(route('about'));

        $response->assertStatus(200);
    }
}
