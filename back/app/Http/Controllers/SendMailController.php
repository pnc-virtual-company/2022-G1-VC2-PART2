<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use \App\Mail\Register;
use \App\Mail\VerifyCode;

class SendMailController extends Controller
{
    public function sendRegister(Request $request)
    {
        $email = $request->email;
        $user = User::with('alumni')->where('email', $email)->first();
        $eroUser = User::where('role', 'ero')->get();
        foreach ($eroUser as $ero) {
            \Mail::to($ero->email)->send(new Register($user));
        }
        return $eroUser;
    }
    public function sendVerifyCode(Request $request)
    {
        $email = $request->email;
        $user = User::where('email', $email)->first();
        \Mail::to($email)->send(new VerifyCode($user));
        return $user;
    }

}
