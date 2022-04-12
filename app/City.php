<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'code',
        'name'
    ];

    public function provinces()
    {
        return $this->belongsTo('App\Province');
    }

    public function guest_book()
    {
        return $this->hasMany('App\GuestBook');
    }
}
