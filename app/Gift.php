<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Gift extends Model
{
    //
    protected $guarded = [];

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function scopeWhenSearch($query, $search)
    {
        return $query->when($search, function ($q) use ($search) {
            return $q->where('name', 'like', "%$search%");
        });
    }
    public function scopeWhenCategory($query, $request)
    {
        return $query->when($request, function ($q) use ($request) {
            $q->whereIn('category_id', $request);
        });
    }

    public function scopeWhenTag($query, $request)
    {
        return $query->when($request, function ($q) use ($request) {
            $q->whereIn('tags', $request);
        });
    }

    public function scopeWhenMax($query, $request)
    {
        return $query->when($request, function ($q) use ($request) {
            $q->where('price', '<', $request);
        });
    }

    public function scopeWhenMin($query, $request)
    {
        return $query->when($request, function ($q) use ($request) {
            $q->where('price', '>', $request);
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

    public function getImagePathAttribute()
    {
        return Storage::url('images/gifts/' . $this->img);
    }

    public function getIsFavoredAttribute()
    {
        if (auth()->user()) {
            return (bool)$this->favorite()->where('user_id', auth()->user()->id)->count();
        }
        return false;
    }

    public function favorite()
    {
        return $this->hasOne(Favorite::class);
    }
}
