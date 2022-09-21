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
    public function AddEducation(Request $request)
    {
        $education = new Education();
        $education->start_month = $request->start_month;
        $education->start_year = $request->start_year;
        $education->end_month = $request->end_month;
        $education->end_year = $request->end_year;
        $education->degree = $request->degree;
        $education->major = $request->major;
        $education->alumni_id = $request->alumni_id;
        $education->university_id = $request->university_id;
        $education->save();
        return response()->json(['status' => ' sucessfully'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function show(Education $education)
    {

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function getAlumniEdu(Request $request, $id)
    {
        return Education::with('university')->where('alumni_id', $id)->get()
            ->reverse()
            ->values();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function updateEducation(Request $request, $id)
    {
        $education = Education::findOrFail($id);
        $education->start_month = $request->start_month;
        $education->start_year = $request->start_year;
        $education->end_month = $request->end_month;
        $education->end_year = $request->end_year;
        $education->degree = $request->degree;
        $education->major = $request->major;
        $education->university_id = $request->university_id;
        $education->save();
        return response()->json(['status' => ' sucessfully'], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function removeEdu(Request $request, $id)
    {
        //
        return Education::destroy($id);
    }
}
