<?php

namespace App\Http\Controllers;

use App\Models\skill;
use App\Models\AlumniSkill;

use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return skill::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $newskill = new skill();
        $newskill->name = $request->name;
        $newskill->save();
        return response()->json($newskill['id']);
    }

    // public function storeAlumniskill(Request $request)
    // {
    //     //
    //     $skills = $request->input();
    //     foreach( $skills as $skill){
    //         if($skill['alumni_id']){
    //             $newskill = new skill();
    //             $newskill->name = $request->$skill['name'];
    //             $newskill->save();
    //             $alumniSkill = new AlumniSkill();
    //             $alumniSkill ->skill_id = $request->$skill['skill_id'];
    //             $alumniSkill ->alumni_id = $request->$skill['alumni_id'];
    //             $alumniSkill ->save();
    //         }else{
    //             $newskill = new skill();
    //             $newskill->name = $request->$skill['name'];
    //             $newskill->save();
    //         }
    //     }
    //     return response()->json(['ms'=>'create skill successfull']);
    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function show(skill $skill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, skill $skill)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function destroy(skill $skill)
    {
        //
    }
}
