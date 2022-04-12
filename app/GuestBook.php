<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GuestBook extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'organization',
        'address',
        'province_code',
        'city_code'
    ];

    public function provinces()
    {
        return $this->belongsTo('App\Province', 'province_code', 'code');
    }

    public function cities()
    {
        return $this->belongsTo('App\City', 'city_code', 'code');
    }
}
