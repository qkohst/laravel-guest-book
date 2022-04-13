<?php

namespace Tests\Feature;

use App\GuestBook;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GuestBooksTest extends TestCase
{

    /**
     * @test
     * Redirect if user not authenticated
     *
     * @return void
     */
    public function redirect_if_user_not_authenticated()
    {
        $response = $this->get('guestbooks')
            ->assertRedirect(route('login'));
    }

    /**
     * @test
     * User loggedin can show guestbooks page
     *
     * @return void
     */
    public function user_loggedin_can_show_guestbooks_page()
    {
        $user = User::first();
        $this->actingAs($user);

        $response = $this->get('guestbooks')
            ->assertStatus(200)
            ->assertViewIs('guestbooks.index');
    }

    /**
     * @test
     * User loggedin can show add guestbooks page
     *
     * @return void
     */
    public function user_loggedin_can_show_add_guestbooks_page()
    {
        $user = User::first();
        $this->actingAs($user);

        $response = $this->get('guestbooks/create')
            ->assertStatus(200)
            ->assertViewIs('guestbooks.create');
    }

    /**
     * @test
     * User loggedin posted guestbook succeeded
     *
     * @return void
     */
    public function user_loggedin_posted_guestbook_succeded()
    {
        $user = User::first();
        $this->actingAs($user);

        $response = $this->post('guestbooks', [
            'first_name' => 'Qkoh',
            'last_name' => 'St',
            'organization' => 'Indonesia Raya',
            'address' => 'Tambakboyo',
            'province' => 35,
            'city' => 3523,
        ])
            ->assertStatus(302)
            ->assertSessionHas('toast_success');
    }

    /**
     * @test
     * User loggedin posted guestbook failed
     *
     * @return void
     */
    public function user_loggedin_posted_guestbook_failed()
    {
        $user = User::first();
        $this->actingAs($user);

        $response = $this->post('guestbooks', [
            'first_name' => 'Qkoh',
            'last_name' => 'St',
            'organization' => 'Indonesia Raya',
            'address' => 'Tambakboyo',
        ])
            ->assertStatus(302)
            ->assertSessionHas('toast_error');
    }

    /**
     * @test
     * User loggedin can show edit guestbook page
     *
     * @return void
     */
    public function user_loggedin_can_show_edit_guestbook_page()
    {
        $user = User::first();
        $this->actingAs($user);

        $guestbook = GuestBook::first();
        $response = $this->get('guestbooks/' . $guestbook->id . '/edit')
            ->assertStatus(200)
            ->assertViewIs('guestbooks.edit');
    }

    /**
     * @test
     * User loggedin updated guestbook succeeded
     *
     * @return void
     */
    public function user_loggedin_updated_guestbook_succeeded()
    {
        $user = User::first();
        $this->actingAs($user);

        $guestbook = GuestBook::first();
        $response = $this->patch('guestbooks/' . $guestbook->id, [
            'first_name' => $guestbook->first_name,
            'last_name' => $guestbook->last_name,
            'organization' => 'Indonesia Raya Edit',
            'address' => 'Tambakboyo Edit',
            'province' => $guestbook->province_code,
            'city' => $guestbook->city_code,
        ])
            ->assertStatus(302)
            ->assertSessionHas('toast_success');
    }

    /**
     * @test
     * User loggedin updated guestbook failed
     *
     * @return void
     */
    public function user_loggedin_updated_guestbook_failed()
    {
        $user = User::first();
        $this->actingAs($user);

        $guestbook = GuestBook::first();
        $response = $this->patch('guestbooks/' . $guestbook->id, [
            'first_name' => $guestbook->first_name,
            'last_name' => $guestbook->last_name,
            'organization' => '',
            'address' => 'Tambakboyo Edit',
            'province' => $guestbook->province_code,
            'city' => $guestbook->city_code,
        ])
            ->assertStatus(302)
            ->assertSessionHas('toast_error');
    }

    /**
     * @test
     * User loggedin can deleted guestbook
     *
     * @return void
     */
    public function user_loggedin_can_deleted_guestbook()
    {
        $user = User::first();
        $this->actingAs($user);

        $guestbook = GuestBook::orderBy('created_at', 'DESC')->first();
        $response = $this->delete('guestbooks/' . $guestbook->id)
            ->assertStatus(302)
            ->assertSessionHas('toast_success');
    }
}
