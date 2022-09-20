<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use \App\Mail\VerifyCode;

class SendMailController extends Controller
{
    public function sendVerifyCode(Request $request)
    {
        $email = $request->email;
        $user = User::where('email', $email)->first();
        \Mail::to($email)->send(new VerifyCode($user));
        return $user;
    }

}
