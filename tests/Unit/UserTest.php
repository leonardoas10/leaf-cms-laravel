<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class UserTest extends TestCase
{
    use WithFaker;
    use RefreshDatabase;

    public function testUserStore()
    {
        $user = factory(User::class)->create();

        $payload = [
            'firstname' => 'Tayler',
            'lastname' => 'Hudson',
            'username' => 'TaylerHudson',
            'email' => 'tayler@gmail.com',
            'role' => 'Subscriber',
            'password' =>  '123456789',
            'password_confirmation' => '123456789',
        ];

        $database_has = [
            'firstname' => 'Tayler',
            'lastname' => 'Hudson',
            'username' => 'TaylerHudson',
            'email' => 'tayler@gmail.com',
            'role' => 'Subscriber',
        ];
        
        $response = $this->actingAs($user)->post('admin/users/', $payload);
        $response->assertStatus(302)->assertRedirect('admin/users');
        $this->assertDatabaseHas('users', $database_has);
    }

    public function testPasswordDidntMatch() 
    {
        $user = factory(User::class)->create();

        $payload = [
            'firstname' => 'Tayler',
            'lastname' => 'Hudson',
            'username' => 'TaylerHudson',
            'email' => 'tayler@gmail.com',
            'role' => 'Subscriber',
            'password' =>  '123456789',
            'password_confirmation' => '123456789123456789',
        ];

        $response = $this->actingAs($user)->json('POST', 'admin/users/', $payload);
        $response->assertStatus(422)->assertSeeText('The password confirmation does not match.');
    }

    public function testUnexistRole() 
    {
        $user = factory(User::class)->create();

        $payload = [
            'firstname' => 'Tayler',
            'lastname' => 'Hudson',
            'username' => 'TaylerHudson',
            'email' => 'tayler@gmail.com',
            'role' => 'Unexist Role',
            'password' =>  '123456789',
            'password_confirmation' => '123456789',
        ];

        $response = $this->actingAs($user)->json('POST', 'admin/users/', $payload);

        $response->assertStatus(422)->assertSeeTextInOrder([
            "The role must start with one of the following: Admin, Subscriber",
            "The role must end with one of the following: Admin, Subscriber",
            "The role may only contain letters.",
        ]);
    }
 }
