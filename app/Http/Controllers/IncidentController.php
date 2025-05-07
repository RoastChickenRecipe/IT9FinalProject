<?php

namespace App\Http\Controllers;

use App\Exports\IncidentsExport;
use App\Models\ComplainantModel;
use App\Models\EmployeeModel;
use App\Models\IncidentModel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB as FacadesDB;
use Maatwebsite\Excel\Facades\Excel;

class IncidentController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = IncidentModel::latest()->get();
        return view('interface.incidentInterface', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brgy = FacadesDB::table('municipalities')
                ->join('barangays', 'municipalities.id', 'barangays.municipality_id')
                ->select('municipalities.id AS mun_id',
                        'barangays.id AS brgy_id',
                        'municipalities.mun_name',
                        'barangays.brgy_name')
                ->orderBy('mun_name', 'ASC')
                ->orderBy('brgy_name', 'ASC')
                ->get();
        $emp = EmployeeModel::where('id', '=', session('loginId'))->first();

        return view('forms.createIncident', ['brgy' => $brgy, 'emp' => $emp]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //return redirect(route('incidents.index'));
        $request->validate([
            'mun_id' => 'required',
            'brgy_id' => 'required',
            'rep_date' => 'required',
            'empId' => 'required',
            'location' => 'required',
            'dates_time' => 'required',

            'typeOfIncident' => 'required',
            'description' => 'nullable',
            'involved' => 'nullable',
            'action_taken' => 'nullable'

        ], [
            'mun_id.required' => 'This field is required',
            'rep_date.required' => 'This field is required',
            'location.required' => 'This field is required',
            'typeOfIncident.required' => 'This field is required',
    
        ]);

        IncidentModel::create([
            'incident_type' => $request->typeOfIncident,
            'description' => $request->description,
            'inc_address' => $request->location,
            'dates_time' => $request->dates_time,
            'involved' => $request->involved,
            'action_taken' => $request->action_taken,
            'date_reported' => $request->rep_date,
            'mun_id' => $request->mun_id,
            'brgy_id' => $request->brgy_id,
            'employee_id' => $request->empId
        ]);
        $id = $request->input('compl_id');
        //return redirect(route('complainants.show', $id))->with('message', 'Incident Created Successfully');
        return redirect(route('incidents.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $data = IncidentModel::findOrFail($id);
        return view('views.viewIncident', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = IncidentModel::findOrFail($id);
        $brgy = FacadesDB::table('municipalities')
                ->join('barangays', 'municipalities.id', 'barangays.municipality_id')
                ->select('municipalities.id AS mun_id',
                        'barangays.id AS brgy_id',
                        'municipalities.mun_name',
                        'barangays.brgy_name')
                ->where('barangays.id', '<>', $data->brgy_id)
                ->orderBy('mun_name', 'ASC')
                ->orderBy('brgy_name', 'ASC')
                ->get();
        $emp = EmployeeModel::findOrFail(session('loginId'));
        return view('forms.editIncident', ['incData' => $data, 'brgy' => $brgy, 'emp' => $emp]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'mun_id' => 'required',
            'brgy_id' => 'required',
            'rep_date' => 'required',
            'empId' => 'required',
            'location' => 'required',
            'dates_time' => 'required',

            'typeOfIncident' => 'required',
            'description' => 'nullable',
            'involved' => 'nullable',
            'action_taken' => 'nullable'

        ], [
            'mun_id.required' => 'This field is required',
            'rep_date.required' => 'This field is required',
            'location.required' => 'This field is required',
            'typeOfIncident.required' => 'This field is required',
    
        ]);
        IncidentModel::findOrFail($id)->update([
            'incident_type' => $request->typeOfIncident,
            'description' => $request->description,
            'inc_address' => $request->location,
            'dates_time' => $request->dates_time,
            'involved' => $request->involved,
            'action_taken' => $request->action_taken,
            'date_reported' => $request->rep_date,
            'mun_id' => $request->mun_id,
            'brgy_id' => $request->brgy_id,
            'employee_id' => $request->empId
        ]);
        
        return redirect(route('incidents.show', $id))->with('message', 'Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        IncidentModel::findOrFail($id)->delete();
        return redirect(route('incidents.index'));
    }

    public function exportIncident(Request $request)
    {
        $request->validate(['incId' => 'required']);

        $get = IncidentModel::findOrFail($request->incId);

        $data = [
            'title' => 'Incident',
            'no' => $get->id,
            'mun' =>$get->IncToMun->mun_name,
            'brgy' =>$get->IncToBrgy->brgy_name,
            'date' => $get->date_reported,
            'issued_by' => $get->IncToEmp->e_fname. ' '. $get->IncToEmp->e_lname,

            'incType' => $get->incident_type,
            'location' => $get->inc_address,
            'dates_time' => $get->dates_time,
            'description' => $get->description,
            'involved' => $get->involved,
            'action' => $get->action_taken   
            
        ];

        $pdf = Pdf::loadView('pdfTemplate.incidentTemp', $data);
        return $pdf->download(date('d-m-Y') . '_'.$get->id. '_'. $get->incident_type. '.pdf');
    }

    

}
