<?php

namespace App\Http\Controllers;

use App\Models\Univercity;
use Illuminate\Http\Request;

class UnivercityController extends Controller
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
        $univercity = new Univercity();
        $univercity->name = $request->name;
        $univercity->address = $request->address;
        $univercity->save();
        return response()->json(['status' => ' sucessfully'],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Univercity  $univercity
     * @return \Illuminate\Http\Response
     */
    public function show(Univercity $univercity)
    {
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Univercity  $univercity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $univercity =Univercity::findOrFail($id);
        $univercity->name = $request->name;
        $univercity->address = $request->address;
        $univercity->save();
        return response()->json(['status' => ' sucessfully'],201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Univercity  $univercity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Univercity $univercity)
    {
        //
    }
}
