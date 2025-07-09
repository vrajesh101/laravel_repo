<?php

namespace App\Http\Controllers;

use App\Models\students;
use Illuminate\Http\Request;

class studentController extends Controller
{
    //

    public function addStudent(Request $request){
        students::create([
            "name"=>$request->name,
            "subject"=>$request->subject,
             "gender"=>$request->gender,
             "age"=>$request->age,
             "city"=>$request->city
        ]);
      
    }
}
