<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegisteredCar extends Model
{
    public function brand()
    {
        return $this->belongsTo('App\Brand');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function color()
    {
        return $this->belongsTo('App\Color');
    }
}
