<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pivote extends Model
{
    //
    use HasFactory;

  protected $fillable = ['master_id', 'manytomanies_id'];
  public $timestamps=false;

}
