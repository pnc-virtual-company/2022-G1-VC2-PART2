<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Alumni;
use App\Models\Ero;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        $user->tokens()->delete();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['sms'=>'invalid', 'email'=> $request->email, 'password'=> $request->password], 404);
        }
        $token = $user->createToken('mytoken')->plainTextToken;
        return response()->json(['token'=> $token, 'role'=> $user->role], 202);
    }

    public function getInfoByToken(){
        $info = auth('sanctum')->user();
        return Response()->json(['data'=>$info]);
    }

    public function logout(Request $request){
        auth()->user()->tokens()->delete();
        return response()->json(['sms'=>'logged out']);
    }

    public function resetpassword(Request $request, $userId){
        $user = User::find($userId);
        if(Hash::check($request->oldpassword, $user->password)){
            $user->password = Hash::make($request->newpassword);
            $user->save();
            return Response()->json(['massage'=>'user password have been change!']);
        }else {
            return Response()->json(['sms'=>"old password is not correct"]);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        $user->save();

        $alumni = new Alumni();
        $alumni->user_id = $user->id;
        $alumni->profile = $request->profile;
        $alumni->coverimage = $request->coverimage;
        $alumni->gender = $request->gender;
        $alumni->phone = $request->phone;
        $alumni->batch = $request->batch;
        $alumni->major = $request->major;
        $alumni->save();
        return Response()->json(['message'=> 'successful'],200);

        $ero = new Ero();
        $ero->user_name = $request-> user_name;
        $ero->email = $request->email;
        $ero->password=bcsqrt($request->password);
        $ero->save();
        return Response()->json(['message'=> 'successful'],200);
    }

// =========================================================Upload Profile

    public function uploadAlumniProfile(Request $request, $id){
        $alumni = Alumni::find($id);
        $path = public_path('images/profile');
        
        if ($alumni->profile !== 'female.jpg' && $alumni->profile !== 'male.png') {
            $previousProfilePublicPath = public_path('images/profile/' . $alumni->profile);

            if(File::exists($previousProfilePublicPath)){
                File::delete($previousProfilePublicPath);
            }
        }
        $file = $request->profile;
        $fileName = uniqid() . '_' . trim($file->getClientOriginalName());
        $alumni->profile = $fileName;
        $file->move($path, $fileName);
        $alumni->save();
        return response()->json(['status' => 'Upload profile sucessfully'],200);
    }

// =========================================================uploadcorver

public function uploadAlumniCover(Request $request, $id){
    
    $alumni = Alumni::find($id);
    $path = public_path('images/Cover');

    if ($alumni->coverimage !== 'cover.jpg') {
        $previousProfilePublicPath = public_path('images/cover/' . $alumni->coverimage);
        if(File::exists($previousProfilePublicPath)){
            File::delete($previousProfilePublicPath);
        }
    }
    $file = $request->coverimage;
    $fileName = uniqid() . '_' . trim($file->getClientOriginalName());
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

        $alumni = Alumni::where('user_id', $id) -> update([
            'batch' => $request->batch,
            'gender' => $request->gender,
            'major' => $request->major,
            'phone' => $request->phone,
        ]);
        return Response()->json(['message'=> 'successful'],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}