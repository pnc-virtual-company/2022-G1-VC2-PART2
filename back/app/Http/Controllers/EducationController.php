<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $education = new Education();
        $education->School_name = $request->School_name;
        $education->start_date= $request->start_date;
        $education->end_date= $request->end_date;
        $education->Bachelor= $request->Bachelor;
        $education->alumni_id= $request->alumni_id;
        $education->univercity_id= $request->univercity_id;
        $education->save();
        return response()->json(['status' => ' sucessfully'],200);
    }   


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function show(Education $education)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $education = Education::findOrFail($id);
        $education->School_name = $request->School_name;
        $education->start_date= $request->start_date;
        $education->end_date= $request->end_date;
        $education->Bachelor= $request->Bachelor;
        $education->alumni_id= $request->alumni_id;
        $education->univercity_id= $request->univercity_id;
        $education->save();
        return response()->json(['status' => ' sucessfully'],201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function destroy(Education $education)
    {
        //
    }
}
