<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\userinfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Livewire\Attributes\Validate;
use Yajra\DataTables\Facades\DataTables;
use App\Rules\Number;

class UserController extends Controller
{
    public function getUser(Request $request)
    {
        if ($request->ajax()) {

            $userQuery = User::select('*');
            if ($request->age) {
                $age = explode("-", $request->age);

                $userQuery->whereBetween("age", [(int)$age[0],(int)$age[1]]);
            }

            return Datatables::of($userQuery)->make(true);
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
            "name" => ["required", "min:3", "max:30"],
            "email" => "required|email",
            "age" => ["required", new Number()],
            "contactno" => "required"
        ], [
            "name.required" => "name can not be empty",
            "name.min" => "name atleast  should be 3 character",
            "name.max" => "name maximum should be 30 ",
            "email.email" => "this email is not valid"
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
            "name" => ["required", "min:3", "max:30"],
            "email" => "required|email",
            "age" => ["required", new Number()],
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
