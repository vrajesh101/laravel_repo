<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Onetomanies extends Model
{
    //

    function master(){   
    return $this->belongsTo(Masters::class);
    }
}
