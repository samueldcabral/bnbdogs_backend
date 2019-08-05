<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    //
    protected $fillable = [
        'booking_date', 'duration', 'check-in_date', 'check-out_date', 'status', 'day_price', 'dog_id'
    ];

    public function services()
    {
        return $this->belongsToMany('App\Service');
    }

    public function dog()
    {
        return $this->belongsTo('App\Dog');
    }
}
