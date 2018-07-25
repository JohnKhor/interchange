<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guest_can_view_login_page()
    {
        $this->assertGuest()
            ->get(route('login'))
            ->assertOk()
            ->assertSee('Login')
            ->assertSee('Log into your account');
    }

    /** @test */
    public function guest_can_login_with_username_and_password()
    {
        $user = factory(User::class)->create();

        $response = $this->post(route('login.store'), [
            'usernameOrEmail' => $user->username,
            'password' => "secret", // UserFactory always use this as password
        ]);

        $response->assertSessionMissing('errors');

        $this->assertAuthenticated();
    }

    /** @test */
    public function guest_can_login_with_email_and_password()
    {
        $user = factory(User::class)->create();

        $response = $this->post(route('login.store'), [
            'usernameOrEmail' => $user->email,
            'password' => "secret", // UserFactory always use this as password
        ]);

        $response->assertSessionMissing('errors');

        $this->assertAuthenticated();
    }

    /** @test */
    public function there_is_credentials_error_when_guest_fail_to_login()
    {
        $user = factory(User::class)->create();

        $response = $this->post(route('login.store'), [

        ]);

        $response->assertSessionHasErrors('credentials');
    }

    /** @test */
    public function user_cannot_view_login_page()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user)
            ->get(route('login'))
            ->assertRedirect(route('home'));
    }

    /** @test */
    public function user_can_logout()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user)
            ->get(route('logout'))
            ->assertRedirect(route('home'));

        $this->assertGuest();
    }

    /** @test */
    public function guest_cannot_access_logout_page()
    {
        $this->assertGuest()
            ->get(route('logout'))
            ->assertRedirect(route('home'));
    }
}
