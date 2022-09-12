<?php

namespace App\Http\Controllers;

use App\Models\Workexperience;
use Illuminate\Http\Request;

class WorkexperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Workexperience::get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $workexperience = new Workexperience();
        $workexperience->start_year= $request->start_year;
        $workexperience->end_year= $request->end_year;
        $workexperience->alumni_id= $request->alumni_id;
        $workexperience->company_id= $request->company_id;
        $workexperience->save();
        return response()->json(['message'=> 'Created workexperience successfully']);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Workexperience  $workexperience
     * @return \Illuminate\Http\Response
     */
    public function show(Workexperience $workexperience)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Workexperience  $workexperience
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $workexperience = Workexperience::findOrFail($id);
        $workexperience->start_year= $request->start_year;
        $workexperience->end_year= $request->end_year;
        $workexperience->alumni_id= $request->alumni_id;
        $workexperience->company_id= $request->company_id;
        $workexperience->save();
        return response()->json(['message'=> 'Created workexperience successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Workexperience  $workexperience
     * @return \Illuminate\Http\Response
     */
    public function destroy(Workexperience $workexperience)
    {
        //
    }
}
