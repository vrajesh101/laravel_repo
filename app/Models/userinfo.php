<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class userinfo extends Model
{
    //

     protected $fillable = [
        'name',
        'email',
        'age',
        'contactno'
    ];
}
