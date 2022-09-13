<?php

namespace App\Http\Controllers;

use App\Models\Workexperience;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


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
        $workexperience->position= $request->position;
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

    public function show(Request $request,$alumni_id)
    {
        $alumniExperience = Workexperience::join('alumnis', 'alumnis.id', '=', 'workexperiences.alumni_id')
        ->join('companies', 'companies.id', '=', 'workexperiences.company_id')
        ->where('workexperiences.alumni_id', '=', $alumni_id)
        ->orderBy('workexperiences.created_at', 'desc')
        ->get(['companies.name','workexperiences.*'])->all();
        return $alumniExperience;
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
        $workexperience->position= $request->position;
        $workexperience->company_id= $request->company_id;
        $workexperience->save();
        return response()->json(['message'=> 'update workexperience successfully']);
    }
    // UPDATE tweets SET spam = 1 WHERE tweets.user_id = users.user_id AND users.name = 'SUSPENDED'

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