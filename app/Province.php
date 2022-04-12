<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $fillable = [
        'code',
        'name'
    ];

    public function cities()
    {
        return $this->hasMany('App\City');
    }

    public function guest_book()
    {
        return $this->hasMany('App\GuestBook');
    }
}
