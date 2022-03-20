<?php

namespace Tests\Feature\Profile;

use Tests\TestCase;
use App\Models\User;
use App\Models\Blog;
use Illuminate\Http\UploadedFile;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BlogControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_authenticated_user_can_view_blog()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->get(route('profile.blogs.index'));

        $response->assertStatus(200);
    }

    public function test_authenticated_user_can_view_blog_create_page()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->get(route('profile.blogs.create'));

        $response->assertStatus(200);
    }

    public function test_authenticated_user_can_create_blog()
    {
        \Storage::fake('blog');

        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->post(route('profile.blogs.store'), [
                'title' => $this->faker->title,
                'banner' => UploadedFile::fake()->image('avatar.jpg'),
                'details' => $this->faker->sentence,
                'status' => $this->faker->randomElement(config('enums.blog_status')),
            ]);

        $response->assertRedirect();
        $response->assertSessionHasNoErrors();
    }

    public function test_authenticated_user_can_view_blog_to_edit()
    {
        $user = User::factory()->create();

        $blog = Blog::factory()->create();

        $response = $this->actingAs($user)
            ->get(route('profile.blogs.show', $blog));

        $response->assertStatus(200);
    }

    public function test_authenticated_user_can_update_blog()
    {
        \Storage::fake('blog');

        $user = User::factory()->create();

        $blog = Blog::factory()->create();

        $response = $this->actingAs($user)
            ->post(route('profile.blogs.store', $blog), [
                'title' => $this->faker->title,
                'banner' => UploadedFile::fake()->image('avatar.jpg'),
                'details' => $this->faker->sentence,
                'status' => $this->faker->randomElement(config('enums.blog_status')),
            ]);

        $response->assertRedirect();
        $response->assertSessionHasNoErrors();
    }
}
