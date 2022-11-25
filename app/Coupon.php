<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    //
    protected $fillable=['code', 'percent', 'expire_date'];

    public function scopeWhenSearch($query, $search)
    {
        return $query->when($search,function($q) use ($search){
            return $q->where('code','like',"%$search%");
        });
    }
    
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
