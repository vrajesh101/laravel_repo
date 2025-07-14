<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masters extends Model
{
    //
    use HasFactory;


 public $timestamps=false;

   function Onetoonechild(){
        return $this->hasOne("App\Models\Onetoone","master_id");
    }

    function Onetomanychild(){
        return $this->hasMany("App\Models\Onetomanies","master_id");
    }

}
