<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = ['user_id', 'name', 'phone', 'delivery_date', 'delivery_time', 'city', 'address', 'details','status', 'represntative_id', 'represntative_note' , 'price'];
    // protected $guraded=[];
    public function gifts()
    {
        return $this->belongsToMany(Gift::class, 'orders_gifts');
    }


    public function orders_gifts()
    {
        return $this->hasMany(OrdersGifts::class);
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function represntative()
    {
        return $this->belongsTo(User::class,'represntative_id');
    }


}
