<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $guraded=[];


    public function gifts()
    {
        return $this->belongsToMany(Gift::class, 'orders_gifts');
    }
}
