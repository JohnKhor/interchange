<?php

namespace Tests\Feature;

use \App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guest_can_view_register_page()
    {
        $this->assertGuest()
            ->get(route('register'))
            ->assertOk()
            ->assertSee('Register')
            ->assertSee('Create your personal account');
    }

    /** @test */
    public function guest_can_register()
    {
        $response = $this->post(route('register.store'), [
            'username' => 'johnkhor',
            'email' => 'johnkhor@gmail.com',
            'password' => "secret",
            'password_confirmation' => 'secret',
        ]);

        $response->assertRedirect(route('home'))
            ->assertSessionMissing('errors')
            ->assertSessionHas('success', 'You have successfully register as an user!');

        $this->assertAuthenticated();

        $this->assertDatabaseHas('users', [
            'username' => 'johnkhor',
            'email' => 'johnkhor@gmail.com',
        ]);
    }

    /** @test */
    public function user_is_redirected_when_viewing_register_page()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->get(route('register'))
            ->assertRedirect(route('home'));
    }
}
