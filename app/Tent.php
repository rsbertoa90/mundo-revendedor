<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Tent extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

       public function orders()
    {
        return $this->hasMany(Order::class);
    }
    
}
