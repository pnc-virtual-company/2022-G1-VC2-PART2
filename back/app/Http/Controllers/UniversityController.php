<?php

namespace App\Http\Controllers;

use App\Models\University;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UniversityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getUniversities()
    {
        return University::get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createUniversity(Request $request)
    {
        $university = new University();
        $path = public_path('images/profile');
        if ($university->profile !== 'female.jpg' && $university->profile !== 'male.png') {
            $previousProfilePublicPath = public_path('images/profile/' . $university->profile);

            if (File::exists($previousProfilePublicPath)) {
                File::delete($previousProfilePublicPath);
            }
        }
        $file = $request->profile;
        $fileName = uniqid() . '_' . trim($file->getClientOriginalName());
        $university->profile = $fileName;
        $file->move($path, $fileName);
        $university->name = $request->name;
        $university->address = $request->address;
        $university->save();
        return response()->json(['status' => ' sucessfully'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\University  $university
     * @return \Illuminate\Http\Response
     */
    public function show(University $university)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\University  $university
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $university = University::findOrFail($id);
        $university->name = $request->name;
        $university->address = $request->address;
        $university->save();
        return response()->json(['status' => ' sucessfully'], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\University  $university
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        University::destroy($id);
        return response()->json(['message'=>"The company has been removed"]);
    }
}
