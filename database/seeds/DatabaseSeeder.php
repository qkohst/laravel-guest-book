<?php

use App\City;
use App\Province;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'role' => 1,
            'password' => bcrypt('123456')
        ]);

        $provinces = Http::get('https://d.kapanlaginetwork.com/banner/test/province.json')->json();
        foreach ($provinces as $province) {
            Province::create([
                'code' => $province['kode'],
                'name' => $province['nama']
            ]);
        }

        $cities = Http::get('https://d.kapanlaginetwork.com/banner/test/city.json')->json();
        foreach ($cities as $city) {
            City::create([
                'code' => $city['kode'],
                'name' => $city['nama']
            ]);
        }
    }
}
