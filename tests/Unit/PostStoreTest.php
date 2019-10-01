<?php

namespace Tests\Unit;

use App\Category;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class PostStoreTest extends TestCase
{
    use WithFaker;
    use RefreshDatabase;

    public function testPostStore()
    {
        $this->withoutMiddleware();
        $user = factory(User::class)->create(); 
        $category = factory(Category::class)->create();

        $this->actingAs($user)->get('admin/posts');

        $title = $this->faker->name;
        $payload = [
            'title' => $title,
            'category_id' => $category->id,
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'tags' => 'Lorem',
            'status' => 'Draft',
            'image' => '',
        ];

        $response = $this->json('POST', 'admin/posts/', $payload)->dump();

        $response->assertStatus(302)->assertRedirect('admin/posts');
        $this->assertDatabaseHas('posts', $payload);
    }

    public function testWhenUserSendEmpty() 
    {
        $this->withoutMiddleware();
        $user = factory(User::class)->create(); 
        $this->actingAs($user)->get('admin/posts');

        $response = $this->json('POST', 'admin/posts/', []);
        $response->assertStatus(422);
    }

    public function testUserUseAndUnexistCategoryId() {
        $this->withoutMiddleware();
        $user = factory(User::class)->create(); 

        $this->actingAs($user)->get('admin/posts');

        $title = $this->faker->name;
        $payload = [
            'title' => $title,
            'category_id' => 3,
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'tags' => 'Lorem',
            'status' => 'Draft',
            'image' => '',
        ];

        $response = $this->json('POST', 'admin/posts/', $payload);
        $response->assertStatus(422)->assertSeeText('The selected category id is invalid.');
    }
}
