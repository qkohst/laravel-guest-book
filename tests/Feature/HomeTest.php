<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeTest extends TestCase
{
    /** 
     * @test
     * Anyone can show home page
     *
     * @return void
     */
    public function anyone_can_show_home_page()
    {
        $response = $this->get('/')
            ->assertStatus(200)
            ->assertViewIs('home.index');
    }

    /** 
     * @test
     * Anyone can show add guestbook page
     *
     * @return void
     */
    public function anyone_can_show_add_guestbook_page()
    {
        $response = $this->get('/create')
            ->assertStatus(200)
            ->assertViewIs('home.create');
    }

    /** 
     * @test
     * posted geustbook succesded
     *
     * @return void
     */
    public function posted_guestbook_succesded()
    {
        $response = $this->post('/', [
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
     * posted geustbook failed
     *
     * @return void
     */
    public function posted_guestbook_failed()
    {
        $response = $this->post('/', [])
            ->assertStatus(302)
            ->assertSessionHas('toast_error');
    }
}
