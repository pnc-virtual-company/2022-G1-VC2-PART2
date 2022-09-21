<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllCompanies()
    {
        return Company::get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createCompany(Request $request)
    {
        $company = new Company();
        $path = public_path('images/profile');
        if ($company->profile !== 'female.jpg' && $company->profile !== 'male.png') {
            $previousProfilePublicPath = public_path('images/profile/' . $company->profile);

            if(File::exists($previousProfilePublicPath)){
                File::delete($previousProfilePublicPath);
            }
        }
        $file = $request->profile;
        $fileName = uniqid() . '_' . trim($file->getClientOriginalName());
        $company->profile = $fileName;
        $file->move($path, $fileName);
        $company->name = $request->name;
        $company->address=$request->address;
        $company->save();
        return response()->json(['message' => 'Created company successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Company::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $company = Company::findOrFail($id);
        $company->name = $request->name;
        $company->name = $request->name;
        $company->address = $request->address;
        $company->save();
        return response()->json(["message" => "company updated"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Company::destroy($id);
        return response()->json(['message'=>"The company has been removed"]);
    }
}
