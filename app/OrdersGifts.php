<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdersGifts extends Model
{
    protected $guarded=[];

    protected $fillable=['order_id', 'gift_id', 'count'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function gift()
    {
        return $this->belongsTo(Gift::class);
    }
}
