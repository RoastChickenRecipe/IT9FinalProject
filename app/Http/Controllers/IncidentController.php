<?php

namespace App\Http\Controllers;

use App\Models\IncidentModel;
use Illuminate\Http\Request;

class IncidentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = IncidentModel::all();
        return view('interface.incidentInterface', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('forms.crIncidentForm');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'com_name' => 'required',
            'incident' => 'required',
            'rep_date' => 'required',
            'description' => 'required'
        ]);
        IncidentModel::create([
            'complainant_name' => $request->com_name,
            'incident_type' => $request->incident,
            'description' => $request->description,
            'date_reported' => $request->rep_date,
            'status' => 'test',
            'employee_id' => session('loginId')
        ]);

        return redirect(route('incidents.index'));

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
        $data = IncidentModel::findOrFail($id);
        return view('forms.edIncident', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'com_name' => 'required',
            'incident' => 'required',
            'rep_date' => 'required',
            'description' => 'required'
        ]);
        IncidentModel::findOrFail($id)->update([
            'complainant_name' => $request->com_name,
            'incident_type' => $request->incident,
            'description' => $request->description,
            'date_reported' => $request->rep_date,
            'status' => 'test',
            'employee_id' => session('loginId')
        ]);

        return redirect(route('incidents.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
