<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Onetomanies extends Model
{
    //  
    use HasFactory;
        protected $fillable = ['name', 'master_id'];


    function master(){   
    return $this->belongsTo(Masters::class);
    }
   public $timestamps=false;

}
