<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class LoginTest extends TestCase
{
    use WithFaker;
    use RefreshDatabase;

    public function testUserLogin()
    {
        $user = factory(User::class)->create();
        $payload = [
            'email' => $user->email,
            'password' => '123456789'
        ];
        $response = $this->post('/login', $payload);

        $response->assertStatus(302)->assertRedirect('/admin/profile/1');
    }

    public function testUnexistEmail() 
    {
        $payload = [
            'email' => 'UnexistEmail@gmail.com',
            'password' => '123456789'
        ];
        $response = $this->json('POST', '/login', $payload);

        $response->assertStatus(422)->assertSeeText('These credentials do not match our records.');
    }

    public function testUserLogout()
    {
        $user = factory(User::class)->create();
    
        $response = $this->actingAs($user)->post('/logout');

        $response->assertStatus(302)->assertRedirect('/');
    }
}
