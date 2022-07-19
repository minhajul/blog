<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomeControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_home_page_is_visible()
    {
        $response = $this->get(route('home'));

        $response->assertStatus(200);
    }

    public function test_about_page_is_visible()
    {
        $response = $this->get(route('about'));

        $response->assertStatus(200);
    }

    public function test_gallery_page_is_visible()
    {
        $response = $this->get(route('gallery'));

        $response->assertStatus(200);
    }
}
