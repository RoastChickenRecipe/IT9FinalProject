<?php

namespace App\Http\Controllers;

use App\Models\BrgyModel;
use App\Models\MunModel;
use App\Models\SubdModel;
use Illuminate\Http\Request;

class SubdController extends Controller
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
        $data = BrgyModel::all()->toArray();
        return view('forms.addSubdForm', ['barangay' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            's_brgy' => 'required',
            'subdName' => 'required|max:50|unique:subdivisions,subd_name'
        ] , [
            's_brgy.required' => '*This Field is Required',
            'subdName.unique' => 'Name Already Added',
            'subdName.max' => 'Maxximum Name of 50 Characters',
            'subdName.required' => '*This Field is Required'
        ]);

        SubdModel::create([
            'subd_name' => $request->subdName,
            'barangay_id' => $request->s_brgy
        ]);
        $mun = BrgyModel::where('id', '=', $request->s_brgy)->first();
        return redirect(route('municipality.show', $mun->municipality_id))->with('message', $request->subdName . ' Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = BrgyModel::findOrFail($id);
        return view('forms.addSubdForm', ['brgyData' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {   
        $subdData = SubdModel::findOrFail($id);
        $brgyData = BrgyModel::findOrFail($subdData->barangay_id);
        return view('forms.editSubd', [
            'brgyData' => $brgyData,
            'subdData' => $subdData]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            's_brgy' => 'required',
            'subdName' => 'required|max:50|unique:subdivisions,subd_name'
        ] , [
            's_brgy.required' => '*This Field is Required',
            'subdName.unique' => 'Name Already Added',
            'subdName.max' => 'Maxximum Name of 50 Characters',
            'subdName.required' => '*This Field is Required'
        ]);

        SubdModel::findOrFail($id)->update([
            'subd_name' => $request->subdName,
            'barangay_id' => $request->s_brgy
        ]);
        $mun = BrgyModel::where('id', '=', $request->s_brgy)->first();
        return redirect(route('municipality.show', $mun->municipality_id))->with('message', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        SubdModel::findOrFail($id)->delete();
        return redirect()->back()->with('message', 'Deleted Successfully');
    }
}
