<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View ;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    

 public function getUser(Request $request)
    {
        if ($request->ajax()) {

            $data = User::query();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function(){
       
                            $button = '<a href="" class="btn btn-primary btn-sm">Edit</a>
            
                <a href="" class="btn btn-danger btn-sm">Delete</a>';
      
                            return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
          
        return view('users');
    }




}
