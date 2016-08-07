<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{

    function comments()
    {
        return $this->hasMany('App\Comment');
    }

    function user()
    {
        return $this->belongsTo('App\User');
    }

}
