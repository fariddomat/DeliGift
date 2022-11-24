<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    //
    protected $fillable=['user_id', 'head', 'body', 'url', 'status'];

    public function user()
    {
        $this->belongsTo(User::class);
    }

}
