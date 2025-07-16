<?php

namespace App\Http\Controllers;

use App\Models\Masters;
use App\Models\Onetomanies;
use App\Models\Onetoone;

class RelationshipsController extends Controller
{
    //



    public function  Onetoone()
    {
        return Masters::with('Onetoonechild')->get();
    }


    public function OnetoMany()
    {
        return Masters::with("Onetomanychild")->get();
    }
 
    public function ManytoMany(){
        return Masters::with("ManytomanyChild")->get();
    }
 

    public function ManytoOne()
    {
        return Onetomanies::with("master")->get();
    }
     
}
