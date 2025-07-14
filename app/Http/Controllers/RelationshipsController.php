<?php

namespace App\Http\Controllers;

use App\Models\Masters;
use App\Models\Onetomanies;
use App\Models\Onetoone;

class RelationshipsController extends Controller
{
    //
        


    public function  Onetoone(){
        return Onetoone::with("master")->get();
    }


    public function OnetoMany(){
        return Onetomanies::with("master")->get();
    }

}
