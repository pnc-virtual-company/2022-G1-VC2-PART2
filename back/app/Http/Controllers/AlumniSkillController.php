<?php

namespace App\Http\Controllers;

use App\Models\AlumniSkill;
use Illuminate\Http\Request;

class AlumniSkillController extends Controller
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
        $alumniSkill = new AlumniSkill();
        $alumniSkill->alumni_id = $request->alumni_id;
        $alumniSkill->skill_id = $request->skill_id;
        $alumniSkill->save();
        return response()->json(['message'=> 'Created successfully']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AlumniSkill  $alumniSkill
     * @return \Illuminate\Http\Response
     */
    public function show(AlumniSkill $alumniSkill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AlumniSkill  $alumniSkill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $alumniSkill =AlumniSkill::findOrFail($id);
        $alumniSkill->alumni_id = $request->alumni_id;
        $alumniSkill->skill_id = $request->skill_id;
        $alumniSkill->save();
        return response()->json(['message'=> 'Updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AlumniSkill  $alumniSkill
     * @return \Illuminate\Http\Response
     */
    public function destroy(AlumniSkill $alumniSkill)
    {
        //
    }
}
