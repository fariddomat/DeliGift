<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gift extends Model
{
    //
    protected $guarded=[];

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function scopeWhenSearch($query, $search)
    {
        return $query->when($search,function($q) use ($search){
            return $q->where('name','like',"%$search%");
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'orders_gifts');
    }
}
