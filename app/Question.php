<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

    function comments()
    {
        return $this->hasMany('App\Comment');
    }

    function answers()
    {
        return $this->hasMany('App\Answer');
    }

}
