<?php
namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use \App\Mail\InviteAlumni;
use \App\Mail\VerifyCode;

class UserController extends Controller
{

    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        $user->tokens()->delete();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['sms' => 'invalid', 'email' => $request->email, 'password' => $request->password], 404);
        }
        $token = $user->createToken('mytoken')->plainTextToken;
        return response()->json(['token' => $token, 'role' => $user->role, 'status' => $user->status], 202);
    }

    public function getInfoByToken()
    {
        $info = auth('sanctum')->user();
        return Response()->json(['data' => $info]);
    }

    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();
        return response()->json(['sms' => 'logged out']);
    }

    public function resetPassword(Request $request, $userId)
    {
        $user = User::find($userId);
        if (Hash::check($request->oldpassword, $user->password)) {
            $user->password = bcrypt($request->newpassword);
            $user->save();
            return Response()->json(['massage' => 'user password have been change!']);
        } else {
            return Response()->json(['sms' => "old password is not correct"]);
        }
    }
    public function resetPwAfterVerify(Request $request, $userId)
    {
        $user = User::find($userId);
        $user->password = bcrypt($request->newpassword);
        $user->save();
    }

    public function forgetPassword(Request $request)
    {
        $email = $request->email;
        $verifyCode = sprintf("%06d", mt_rand(1, 999999));
        $user = User::where('email', $email)->first();
        if ($user) {
            $user->verifyCode = $verifyCode;
            $user->save();
            $response = [
                'user_id' => $user->id,
                'message' => "successfully",
                'verifyCode' => $verifyCode,
            ];
        } else {
            $response = [
                'message' => "Your verification email was not sent.",
            ];
        };
        return response()->json($response, 202);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAlumniUsers()
    {
        $alumnis = User::join('alumnis', 'users.id', '=', 'alumnis.user_id')
            ->get(['users.first_name', 'users.last_name', 'users.status', 'users.email', 'alumnis.*'])
            ->All();
        return $alumnis;
    }

   
    public function getEroUsers()
    {
        $alumnis = User::where('users.role', '=', 'ero')
            ->orderBy('users.created_at', 'desc')
            ->get();
        return $alumnis;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->status = $request->status;
        $user->verifyCode = $request->verifyCode;

        if ($user->role == 'ero') {
            $random_password = Str::random(8);
            $user->password = bcrypt($random_password);
            $details = [
                'role' => 'Ero',
                'email' => $user->email,
                'password' => $random_password,
            ];
            \Mail::to($user->email)->send(new InviteAlumni($details));
        } else {
            $user->password = bcrypt($request->password);
        }
        $user->save();

        if ($user->role == 'alumni') {
            $alumni = new Alumni();
            $alumni->user_id = $user->id;
            $alumni->coverimage = 'cover.jpg';
            $alumni->gender = $request->gender;
            if($request->gender == 'M') {
                $alumni->profile = 'male.jpg';
            }else {
                $alumni->profile = 'female.jpg';
            }
            $alumni->phone = $request->phone;
            $alumni->batch = $request->batch;
            $alumni->major = $request->major;
            $alumni->save();
        }
        if ($user) {
            return Response()->json(['message' => 'successful'], 200);
        } else {
            return Response()->json(['message' => 'erro'], 200);
        }
    }
    public function inviteAlumni(Request $request)
    {
        $user = new User();
        $email = $request->email;
        $user->email = $email;
        $random_password = Str::random(8);
        $user->password = bcrypt($random_password);
        $user->role = 'alumni';
        $user->status = 'invited';
        $user->save();

        if ($user->role == 'alumni') {
            $alumni = new Alumni();
            $alumni->user_id = $user->id;
            $alumni->save();
        }

        // return $user->password;
        if ($user) {
            $details = [
                'role' => 'Alumni',
                'email' => $email,
                'password' => $random_password,
            ];
            \Mail::to($email)->send(new InviteAlumni($details));
            return Response()->json(['message' => 'successful'], 200);
        } else {
            return Response()->json(['message' => 'error'], 200);
        }
    }

// =========================================================Upload Profile

    public function uploadAlumniProfile(Request $request, $id)
    {
        $alumni = Alumni::find($id);
        $path = public_path('images/profile');
        if ($alumni->profile !== 'female.jpg' && $alumni->profile !== 'male.png') {
            $previousProfilePublicPath = public_path('images/profile/' . $alumni->profile);

            if (File::exists($previousProfilePublicPath)) {
                File::delete($previousProfilePublicPath);
            }
        }
        $file = $request->profile;
        $fileName = date('F-j-Y-H-i-s-A') . '_' . trim($file->getClientOriginalName());
        $alumni->profile = $fileName;
        $file->move($path, $fileName);
        $alumni->save();
        return response()->json(['status' => 'Upload profile sucessfully'], 200);
    }

// =========================================================uploadcorver

    public function uploadAlumniCover(Request $request, $id)
    {
        $alumni = Alumni::find($id);
        $path = public_path('images/Cover');
        if ($alumni->coverimage !== 'cover.jpg') {
            $previousProfilePublicPath = public_path('images/cover/' . $alumni->coverimage);
            if (File::exists($previousProfilePublicPath)) {
                File::delete($previousProfilePublicPath);
            }
        }
        $file = $request->coverimage;
        $fileName = date('F-j-Y-H-i-s-A') . '_' . trim($file->getClientOriginalName());
        $alumni->coverimage = $fileName;
        $file->move($path, $fileName);
        $alumni->save();
        return response()->json(['status' => 'Upload coverimage sucessfully']);
    }
// =========================================================Get Alumni by Id
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showAlumni($id)
    {
        $alumni = DB::table('users')
            ->join('alumnis', 'users.id', '=', 'alumnis.user_id')
            ->where('users.id', '=', $id)
            ->get(['users.*', 'alumnis.*'])
            ->first();
        return $alumni;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->save();

        $alumni = Alumni::where('user_id', $id)->update([
            'batch' => $request->batch,
            'gender' => $request->gender,
            'major' => $request->major,
            'phone' => $request->phone,
        ]);
        return Response()->json(['message' => 'successful'], 200);
    }

    public function updatePassword(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->password = bcrypt($request->password);
        $user->save();
        return Response()->json(['message' => 'successful'], 200);
    }
    
    public function approve(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->status = 'actived';
        $user->save();
        return Response()->json(['message' => 'successful'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        User::destroy($id);
        return response()->json(['message' => "The alumni has been removed"]);
    }
    
    public function getEmail($email) 
    {
        return User::where('email', $email)->get();
    }


    public function fillInfo(Request $request, $id) 
    {
        $user = User::findOrFail($id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->status = 'actived';
        $user->save();

        if($request->gender == 'M') {
            $profile = 'male.jpg';
        }else {
            $profile = 'female.jpg';
        }
        $alumni = Alumni::where('user_id', $id)->update([
            'batch' => $request->batch,
            'gender' => $request->gender,
            'major' => $request->major,
            'phone' => $request->phone,
            'coverimage' => 'cover.jpg',
            'profile' => $profile,
        ]);
        return Response()->json(['message' => $alumni], 200);
    }
}
