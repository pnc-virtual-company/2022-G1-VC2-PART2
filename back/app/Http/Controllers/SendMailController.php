<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use \App\Mail\Register;
use \App\Mail\VerifyCode;
use \App\Mail\RemoveUser;
use \App\Mail\RejectAlumni;
use \App\Mail\ApproveAlumni;

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
    public function sendRemoveAccount(Request $request, $id)
    {
        $user = User::findOrFail($id);
        \Mail::to($user->email)->send(new RemoveUser($user));
        return $user;
    }
    public function rejectAlumni(Request $request, $id)
    {
        $user = User::findOrFail($id);
        \Mail::to($user->email)->send(new RejectAlumni($user));
        return $user;
    }
    public function approveAlumni(Request $request, $id)
    {
        $user = User::findOrFail($id);
        \Mail::to($user->email)->send(new ApproveAlumni($user));
        return $user;
    }
}
