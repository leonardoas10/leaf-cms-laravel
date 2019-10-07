<?php

namespace Tests\Unit;

use App\Category;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use App\User;
use App\Post;

class PostTest extends TestCase
{
    use WithFaker;
    use RefreshDatabase;

    public function testPostStore()
    {
        $user = factory(User::class)->create();
        $category = factory(Category::class)->create();

        $title = $this->faker->firstName; //faker->title contains "." dots and request don't allow it.

        $payload = [
            'title' => $title,
            'category_id' => $category->id,
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'tags' => 'Lorem',
            'status' => 'Draft',
            'image' => UploadedFile::fake()->image('avatar.jpg')
        ];

        $database_has = [
            'title' => $title,
            'category_id' => $category->id,
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'tags' => 'Lorem',
            'status' => 'Draft',
            'image' => 'avatar.jpg',
        ];

        $response = $this->actingAs($user)->post('admin/posts/', $payload);

        $response->assertStatus(302)->assertRedirect('admin/posts');
        $this->assertDatabaseHas('posts', $database_has);
    }

    public function testEmptyFields()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->json('POST','admin/posts/', []);
        $response->assertStatus(422)->assertSeeTextInOrder([
            'The title field is required.',
            'The category id field is required.',
            'The content field is required.',
            'The tags field is required.',
            'The status field is required.',
            'The image field is required.',
        ]);
    }

    public function testUserSendUnexistCategoryId()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user)->get('admin/posts');
        $title = $this->faker->firstName;

        $payload = [
            'title' => $title,
            'category_id' => 300,
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'tags' => 'Lorem',
            'status' => 'Draft',
            'image' => UploadedFile::fake()->image('avatar.jpg'),
        ];

        $response = $this->json('POST', 'admin/posts/', $payload);
        $response->assertStatus(422)->assertSeeText('The selected category id is invalid.');
    }

    public function testUserSendUnexistStatus()
    {
        $user = factory(User::class)->create();
        $category = factory(Category::class)->create();

        $payload = [
            'title' => $this->faker->firstName,
            'category_id' => $category->id,
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'tags' => 'Lorem',
            'status' => 'Unexist Status',
            'image' => UploadedFile::fake()->image('avatar.jpg'),
        ];

        $response = $this->actingAs($user)->json('POST', 'admin/posts/', $payload);

        $response->assertStatus(422);
    }

    public function testUserSendEmptyImage()
    {
        $user = factory(User::class)->create();
        $category = factory(Category::class)->create();

        $payload = [
            'title' => $this->faker->firstName,
            'category_id' => $category->id,
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'tags' => 'Lorem',
            'status' => 'Draft',
            'image' => '',
        ];

        $response = $this->actingAs($user)->json('POST', 'admin/posts/', $payload);
        $response->assertStatus(422)->assertSeeText('The image field is required.');
    }

    public function testUpdatePost()
    {
        $user = factory(User::class)->create();
        $category = factory(Category::class)->create();
        $post = factory(Post::class)->create([
            'category_id' => $category->id,
            'user' => $user->username,
            'user_id' => $user->id,
        ]);

        $update_post = [
            'title' => 'holaaa',
            'category_id' => $post['category_id'],
            'user_id' => $post['user_id'],
            'user' => $post['user'],
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'tags' => 'Lorem',
            'status' => 'Published',
            'image' => UploadedFile::fake()->image('avatar.jpg'),
        ];

        $response = $this->actingAs($user, 'api')->patch(route('posts.update', $post), $update_post);

        $update_post['image'] = 'avatar.jpg';
        $this->assertDatabaseHas('posts', $update_post);

        $response->assertStatus(302)->assertRedirect('admin/posts'); 
    }

    public function testDeletePost()
    {
        $user = factory(User::class)->create();
        $category = factory(Category::class)->create();
        $post = factory(Post::class)->create([
            'category_id' => $category->id,
            'user' => $user->username,
            'user_id' => $user->id,
        ]);

        $this->actingAs($user, 'api')->delete(route('posts.destroy', $post));
        $this->assertDatabaseMissing('posts', $post->toArray());
        $this->assertCount(0, Post::all());
    }   
}

 


