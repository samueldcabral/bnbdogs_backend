<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //
    protected $fillable = [
        'description', 'price', 'obs',
    ];

    public function bookings()
    {
        return $this->belongsToMany('App\Booking');
    }
}
