<?php

namespace App\Http\Controllers;

use App\Exports\IncidentsExport;
use App\Models\ComplainantModel;
use App\Models\IncidentModel;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ComplainantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = ComplainantModel::all();
        return view('interface.incidentInterface', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('forms.createComplaint');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'com_fname' => 'required',
            'com_lname' => 'required',
            'com_conNum' => 'required',
            'address' => 'required',
            'incident' => 'required',
            'rep_date' => 'required',
            'description' => 'required'
        ]);

        ComplainantModel::create([
            'com_fname' => $request->com_fname,
            'com_lname' => $request->com_lname,
            'com_contactNum' => $request->com_conNum,
            'com_address' => $request->address
        ]);

        $compl = ComplainantModel::orderBy('id', 'desc')->take(1)->value('id');

        IncidentModel::create([
            'complainant_id' => $compl,
            'incident_type' => $request->incident,
            'description' => $request->description,
            'date_reported' => $request->rep_date,
            'status' => 'test',
            'employee_id' => session('loginId')
        ]);

        return redirect(route('complainants.show', $compl))->with('message', 'Complaint Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $compl = ComplainantModel::findOrFail($id);
        $data = IncidentModel::where('complainant_id', '=', $id)->orderBy('date_reported', 'desc')->get();
        return view('views.viewIncident', ['compl' => $compl, 'incData' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $editCompl = ComplainantModel::findOrFail($id);
        return view('forms.editComplainant', ['editCompl' => $editCompl]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'com_fname' => 'required',
            'com_lname' => 'required',
            'com_conNum' => 'required',
            'address' => 'required'
        ]);

        ComplainantModel::findOrFail($id)->update([
            'com_fname' => $request->com_fname,
            'com_lname' => $request->com_lname,
            'com_contactNum' => $request->com_conNum,
            'com_address' => $request->address
        ]);
        return redirect(route('complainants.show', $id))->with('message', 'Complainant Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ComplainantModel::findOrFail($id)->delete();
        return redirect(route('complainants.index'));
    }

    public function exportcomplainants()
    {
        
        return Excel::download(new IncidentsExport, 'Incidents.xlsx');
    }
}
