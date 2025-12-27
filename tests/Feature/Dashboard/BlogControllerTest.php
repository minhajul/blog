<?php

declare(strict_types=1);

namespace Tests\Feature\Dashboard;

use App\Enums\BlogStatus;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use JsonException;
use Tests\TestCase;

final class BlogControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_authenticated_user_can_view_blog()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->get(route('dashboard.blogs.index'));

        $response->assertStatus(200);
    }

    public function test_authenticated_user_can_view_blog_create_page()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->get(route('dashboard.blogs.create'));

        $response->assertStatus(200);
    }

    /**
     * @throws JsonException
     */
    public function test_authenticated_user_can_create_blog()
    {
        Storage::fake('blog');

        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->post(route('dashboard.blogs.store'), [
                'title' => $this->faker->title,
                'banner' => UploadedFile::fake()->image('avatar.jpg'),
                'details' => $this->faker->sentence,
                'status' => $this->faker->randomElement(BlogStatus::values()),
            ]);

        $response->assertRedirect();
        $response->assertSessionHasNoErrors();
    }

    public function test_authenticated_user_can_view_blog_to_edit()
    {
        $user = User::factory()->create();

        $blog = Blog::factory()->create();

        $response = $this->actingAs($user)
            ->get(route('dashboard.blogs.show', $blog));

        $response->assertStatus(200);
    }

    /**
     * @throws JsonException
     */
    public function test_authenticated_user_can_update_blog()
    {
        Storage::fake('blog');

        $user = User::factory()->create();

        $blog = Blog::factory()->create();

        $response = $this->actingAs($user)
            ->post(route('dashboard.blogs.store', $blog), [
                'title' => $this->faker->title,
                'banner' => UploadedFile::fake()->image('avatar.jpg'),
                'details' => $this->faker->sentence,
                'status' => $this->faker->randomElement(BlogStatus::values()),
            ]);

        $response->assertRedirect();
        $response->assertSessionHasNoErrors();
    }
}
