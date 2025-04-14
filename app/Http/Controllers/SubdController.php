<?php

namespace App\Http\Controllers;

use App\Models\BrgyModel;
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
        return redirect(route('view.address'));
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
