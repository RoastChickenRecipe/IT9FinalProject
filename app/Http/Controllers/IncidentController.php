<?php

namespace App\Http\Controllers;

use App\Exports\IncidentsExport;
use App\Models\ComplainantModel;
use App\Models\IncidentModel;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class IncidentController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //added to compl
        /*
        $data = ComplainantModel::all();
        return view('interface.incidentInterface', ['data' => $data]);
        */
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
        //return redirect(route('incidents.index'));
        $request->validate([
            'incident' => 'required',
            'rep_date' => 'required',
            'description' => 'required'
        ]);

        IncidentModel::create([
            'complainant_id' => $request->input('compl_id'),
            'incident_type' => $request->incident,
            'description' => $request->description,
            'date_reported' => $request->rep_date,
            'status' => 'test',
            'employee_id' => session('loginId')
        ]);
        $id = $request->input('compl_id');
        return redirect(route('complainants.show', $id))->with('add-inc', 'Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $data = ComplainantModel::findOrFail($id);
        return view('forms.crIncidentForm', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = IncidentModel::findOrFail($id);
        return view('forms.editIncident', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'incident' => 'required',
            'rep_date' => 'required',
            'description' => 'required'
        ]);
        IncidentModel::findOrFail($id)->update([
            'incident_type' => $request->incident,
            'description' => $request->description,
            'date_reported' => $request->rep_date,
            'status' => 'test',
            'employee_id' => session('loginId')
        ]);
        session()->put('success', 'Updated successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        IncidentModel::findOrFail($id)->delete();
        return redirect()->back()->with('del-inc', 'Deleted Successfully');
    }

    public function destroyAll(string $id)
    {
        IncidentModel::where('complainant_id', '=', $id)->delete();
        return redirect()->back()->with('del-all-inc', 'Successfully Deleted All Incidents');
    }

    

}
