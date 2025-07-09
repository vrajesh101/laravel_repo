<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\userinfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Livewire\Attributes\Validate;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{


    public function getUser(Request $request)
    {
        if ($request->ajax()) {

            $data = User::all();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $button = '<div id=' . $row->id . '><button name="edit" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#edituserModal">Edit</button>
                               <button name="delete"  class="btn btn-danger btn-sm">Delete</button></div>';

                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return View('component.user');
    }

    public function deleteUser(Request $request)
    {
        User::find($request->id)->delete();
    }

    public function addUser(Request $request)
    {
        $request->validate([
            "name" => "required|min:3|max:10",
            "email" => "required|email",
            "age" => "required",
            "contactno" => "required"
        ],[
            "name.required"=>"name can not be empty",
            "name.min"=>"name atleast  should be 3 character",
            "name.max"=>"name maximum should be 10 ",
            "email.email"=>"this email is not valid"
            
        ]);

        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "age" => $request->age,
            "contactno" => $request->contactno
        ]);
    }

    public function getUserById(Request $request)
    {

        $user = User::find($request->route()->parameter("id"));
        return response($user);
    }

    public function editUser(Request $request)
    {
        $request->validate([
            "name" => "required|min:3|max:10",
            "email" => "required|email",
            "age" => "required",
            "contactno" => "required"
        ]);

        $existuser = User::find($request->route()->parameter("id"));
        $existuser->name = $request->name;
        $existuser->age = $request->age;
        $existuser->email = $request->email;
        $existuser->contactno = $request->contactno;

        $existuser->save();
    }
}
