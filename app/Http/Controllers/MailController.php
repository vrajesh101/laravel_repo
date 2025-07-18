<?php

namespace App\Http\Controllers;

use App\Mail\MyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    //

    public function sendMail(Request $request){
        
    Mail::to($request->email)->queue(new MyEmail());
         
    return response()->json([
        'status' => 'success',
        'message' => 'Mail sent successfully!'
    ]);



    }
}
