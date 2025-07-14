<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Onetoone extends Model
{
    //
    use HasFactory;

    function master(){   
    return $this->belongsTo(Masters::class);
    }
}
