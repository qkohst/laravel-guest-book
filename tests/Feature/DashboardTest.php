<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DashboardTest extends TestCase
{

    /**
     * @test
     * Redirect if user not authenticated
     *
     * @return void
     */
    public function redirect_if_user_not_authenticated()
    {
        $response = $this->get('dashboard')
            ->assertRedirect(route('login'));
    }
    
    /**
     * @test
     * User loggedin can show dashboard page
     *
     * @return void
     */
    public function user_loggedin_can_show_dashboard_page()
    {
        $user = User::first();
        $this->actingAs($user);

        $response = $this->get('dashboard')
            ->assertStatus(200)
            ->assertViewIs('dashboard.index');
    }
}
