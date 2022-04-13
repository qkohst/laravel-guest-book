<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    /**
     * @test
     * Anyone can show login page
     *
     * @return void
     */
    public function anyone_can_show_login_page()
    {
        $response = $this->get('login')
            ->assertStatus(200)
            ->assertViewIs('auth.login');
    }

    /**
     * @test
     * User can be authenticated using his credentials
     *
     * @return void
     */
    public function user_can_be_authenticated_using_his_credentials()
    {
        $response = $this->post('login', [
            'email' => 'admin@mail.com',
            'password' => '123456'
        ])
            ->assertStatus(302)
            ->assertRedirect(route('dashboard'));
        $this->assertAuthenticated();
    }

    /**
     * @test
     * User may not loggedin with wrong credentials
     *
     * @return void
     */
    public function user_may_not_loggedin_with_wrong_credentials()
    {
        $response = $this->post('login', [
            'email' => 'admin@mail.com',
            'password' => 'password'
        ])
            ->assertStatus(302)
            ->assertSessionHas('toast_error');
        $this->assertGuest();
    }

    /**
     * @test
     * User may not loggedin without credentials
     *
     * @return void
     */
    public function user_may_not_loggedin_without_credentials()
    {
        $response = $this->post('login', [])
            ->assertStatus(302)
            ->assertSessionHas('toast_error');
        $this->assertGuest();
    }

    /**
     * @test
     * User loggedin can be logout
     *
     * @return void
     */
    public function user_loggedin_can_be_logout()
    {
        $user = User::first();
        $this->actingAs($user);

        $response = $this->get('logout')
            ->assertSessionHas('toast_success')
            ->assertStatus(302)
            ->assertRedirect('/');
        $this->withExceptionHandling();
    }
}
