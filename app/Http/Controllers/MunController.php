<?php

namespace App\Http\Controllers;

use App\Models\MunModel;
use Illuminate\Http\Request;

class MunController extends Controller
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
        return view('forms.addMunForm');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'munName' => 'required|max:50|unique:municipalities,mun_name',
            'region' => 'required|max:10'
        ] , [
            'munName.required' => '*This Field is Required',
            'munName.unique' => 'Name Already Added',
            'munName.max' => 'Maxximum Name of 50 Characters',
            'region.required' => '*This Field is Required',
            'region.max' => 'Maxximum Characters is 10',
        ]);

        MunModel::create([
            'mun_name' => $request->munName,
            'region' => $request->region
        ]);
        return redirect(route('view.address'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = MunModel::findOrFail($id);
        return view('views.viewMun', ['data' => $data]);
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
