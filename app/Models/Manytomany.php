<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manytomany extends Model
{
    //
    use HasFactory;

   public $timestamps=false;

     public function masters()
{
    return $this->belongsToMany(
        Masters::class,       
        'pivotes',                      
        'manytomanies_id',              
        'master_id'                   
    );
}



}
