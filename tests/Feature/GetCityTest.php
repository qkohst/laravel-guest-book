<?php

namespace Tests\Feature;

use App\Province;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GetCityTest extends TestCase
{
    /**
     * @test
     * Anyone can get cities by province code
     *
     * @return void
     */
    public function anyone_can_get_cities_by_province_code()
    {
        $province = Province::first();
        $response = $this->get('city/' . $province->code)
            ->assertStatus(200)
            ->assertJsonStructure([
                [
                    'code',
                    'name',
                    'created_at',
                    'updated_at'
                ]
            ]);
    }
}
