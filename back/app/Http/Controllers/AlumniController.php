<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;

class AlumniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Alumni::all();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $alumni = new Alumni();
        $alumni->profile= $request->profile;
        $alumni->batch= $request->batch;
        $alumni->gender=$request->gender;
        $alumni->phone=$request->phone;
        $alumni->major=$request->major;
        $alumni->user_id=$request->user_id;
// ================================================================ Upload Image===============================
        $path = public_path('images/Alumni');
        if ( ! file_exists($path) ) {
            mkdir($path, 0777, true);
        }
        $file = $request->file('profile');
        $fileName = uniqid() . '_' . trim($file->getClientOriginalName());
        $alumni->profile = $fileName;
        $file->move($path, $fileName);
        $alumni->save();
        return response()->json(['status' => 'Created Alumni sucessfully']);
    }
// =================================================================Update profile==============================
public function updateProfile(Request $request,$id){
    $alumni = Alumni::find($id);
    $path = public_path('images/Alumni');
    if ( ! file_exists($path) ) {
        mkdir($path, 0777, true);
    }
    $file = $request->file('profile');
    $fileName = uniqid() . '_' . trim($file->getClientOriginalName());
    $alumni->profile = $fileName;
    $file->move($path, $fileName);
    $alumni->save();
    return response()->json(["message"=>"updateProfile",'data'=>$alumni],200);
}
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alumni  $alumni
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Alumni::findOrFail($id);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alumni  $alumni
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $alumni =Alumni::findOrFail($id);
        $alumni->profile = $request->file('profile')->hashName();
        $alumni->batch = $request->batch;
        $alumni->gender = $request->gender;
        $alumni->phone = $request->phone;
        $alumni->major = $request->major;
        $alumni->user_id = $request->user_id;
        $alumni->save();
        return response()->json(["message"=>"Alumni updated", 'data'=>$alumni],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alumni  $alumni
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alumni $alumni)
    {
        //
    }
}
