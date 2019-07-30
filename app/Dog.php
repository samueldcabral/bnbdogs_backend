<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dog extends Model
{
    //
    protected $fillable = [
        'name', 'age', 'weight', 'breed', 'obs', 'owner',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
