<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\citizenForm;
use App\Models\CitizenModel;

class CitizenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'fname' => 'required|max:50',
            'lname' => 'required|max:50',
            'mname' => 'required|max:50',
            'suff' => 'max:10',
            'sex' => 'required|max:10',
            'age' => 'required|digits_between:1,3|integer|min:1',
            'religion' => 'required|max:50',
            'frole' => 'required|max:50',
            'bType' => 'required',
            'contactNumber' => 'required|digits_between:10,13',
            'yrsOfResidency' => 'required|max:50',
            'birth' => 'required|max:50',
            'placeOfBirth' => 'required|max:50',
            'educAttainment' => 'required|max:100',
            'citStatus' => 'max:100',
            'empStatus' => 'required|max:100',
            'income' => 'required|numeric|gt:0'
        ], [
            'htype.required' => 'This field is required.',
            'fhead.required' => 'This field is required.',
            's_mun.required' => 'This field is required.',
            's_brgy.required' => 'This field is required.',
            's_subd.required' => 'This field is required.',
            'age.min' => 'Age cannot be 0.',
            'age.digits_between' => '1 - 3 charater only.',
            'contactNumber.digits_between' => '10 - 13 character only.',
            'income.gt' => 'Cannot be negative number'
        ]);
        
        CitizenModel::create([
            'fname' => $request->fname,
            'mname' => $request->mname,
            'lname' => $request->lname,
            'suffix' => $request->suff,
            'sex' => $request->sex,
            'age' => $request->age,
            'religion' => $request->religion,
            'family_role' => $request->frole,
            'blood_type' => $request->bType,
            'contactNum' => $request->contactNumber,
            'years_of_residency' => $request->yrsOfResidency,
            'birth_date' => $request->birth,
            'place_of_birth' => $request->placeOfBirth,
            'educational_attainment' => $request->educAttainment,
            'citizen_status' => $request->citStatus,
            'employment_status' => $request->empStatus,
            'income' => $request->income,
            'household_id' => $request->hholdId

        ]);

        return redirect()->back()->with('message', $request->lname. ', ' . $request->fname. ' ' . $request->mname. ' Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $citData = CitizenModel::findOrFail($id);
        return view('forms.editCitizen', ['citData' => $citData]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([

            'fname' => 'required|max:50',
            'lname' => 'required|max:50',
            'mname' => 'required|max:50',
            'suff' => 'max:10',
            
            'sex' => 'required|max:20',
            'age' => 'required|digits_between:1,3|integer|min:1',
            'religion' => 'required|max:50',
            'frole' => 'required|max:50',
            'bType' => 'required',
            'contactNumber' => 'required|digits_between:10,13',
            
            'yrsOfResidency' => 'required|max:50',
            'birth' => 'required|max:50',
            'placeOfBirth' => 'required|max:50',
            'educAttainment' => 'required|max:100',

            'citStatus' => 'max:100',
            'empStatus' => 'required|max:100',
            'income' => 'required|numeric|gt:0'
        ], [
            'htype.required' => 'This field is required.',
            'fhead.required' => 'This field is required.',
            's_mun.required' => 'This field is required.',
            's_brgy.required' => 'This field is required.',
            's_subd.required' => 'This field is required.',
            'age.min' => 'Age cannot be 0.',
            'age.digits_between' => '1 - 3 charater only.',
            'contactNumber.digits_between' => '10 - 13 character only.',
            'income.gt' => 'Cannot be negative number'
        ]);
        
        CitizenModel::findOrFail($id)->update([
            'fname' => $request->fname,
            'mname' => $request->mname,
            'lname' => $request->lname,
            'suffix' => $request->suff,
            
            'sex' => $request->sex,
            'age' => $request->age,
            'religion' => $request->religion,
            'family_role' => $request->frole,
            'blood_type' => $request->bType,
            'contactNum' => $request->contactNumber,
            
            'years_of_residency' => $request->yrsOfResidency,
            'birth_date' => $request->birth,
            'place_of_birth' => $request->placeOfBirth,
            'educational_attainment' => $request->educAttainment,

            'citizen_status' => $request->citStatus,
            'employment_status' => $request->empStatus,
            'income' => $request->income

        ]);
        return redirect(route('households.show', $request->hholdId))->with('message', $request->lname. ', ' . $request->fname. ' ' . $request->mname. ' Updataed Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {   
        CitizenModel::findOrFail($id)->delete();
        return redirect()->back()->with('message', ' Deleted Successfully');
    }
}
