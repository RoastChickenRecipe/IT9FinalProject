<?php

namespace App\Http\Controllers;

use App\Models\BrgyModel;
use App\Models\MunModel;
use Illuminate\Http\Request;

class BrgyController extends Controller
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
        $data = MunModel::all()->toArray();
        return view('forms.addBrgyForm', ['municipality' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            's_mun' => 'required',
            'brgyName' => 'required|max:50|unique:barangays,brgy_name'
        ] , [
            's_mun.required' => '*This Field is Required',
            'brgyName.unique' => 'Name Already Added',
            'brgyName.max' => 'Maxximum Name of 50 Characters',
            'brgyName.required' => '*This Field is Required'   
        ]);

        BrgyModel::create([
            'brgy_name' => $request->brgyName,
            'municipality_id' => $request->s_mun
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
