<?php

namespace App\Http\Controllers;

use App\Exports\IncidentsExport;
use App\Models\BrgyModel;
use App\Models\ComplainantModel;
use App\Models\EmployeeModel;
use App\Models\IncidentModel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ComplainantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = ComplainantModel::orderBy('created_at', 'DESC')->get();
        return view('interface.complaintInterface', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $address = DB::table('municipalities')
                    ->join('barangays', 'municipalities.id', 'barangays.municipality_id')
                    ->join('subdivisions', 'barangays.id', 'subdivisions.barangay_id')
                    ->select('municipalities.id AS mun_id',
                            'barangays.id AS brgy_id',
                            'subdivisions.id AS subd_id',
                            'municipalities.mun_name',
                            'barangays.brgy_name',
                            'subdivisions.subd_name')
                    ->orderBy('mun_name', 'ASC')
                    ->orderBy('brgy_name', 'ASC')
                    ->orderBy('subd_name', 'ASC')
                    ->get();

        $brgy = BrgyModel::all();
        $emp = EmployeeModel::where('id', '=', session('loginId'))->first();
        return view('forms.createComplaint', 
                    ['address' => $address,
                    'brgy' => $brgy,
                    'emp' => $emp]);
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
            'defendant' => 'required',
            'defContact' => 'nullable',
            'defAddress' => 'nullable',
            'rep_date' => 'required',
            'mun_id' => 'required',
            'brgy_id' => 'required',
            'subd_id' => 'required'
        ]);

        ComplainantModel::create([
            'com_fname' => $request->com_fname,
            'com_lname' => $request->com_lname,
            'com_contactNum' => $request->com_conNum,
            'com_address' => $request->address,
            'def_name' => $request->defendant,
            'def_conNum' => $request->defContact,
            'def_address' => $request->defAddress,
            'date_reported' => $request->rep_date,
            'com_mun_id' => $request->mun_id,
            'com_brgy_id' => $request->brgy_id,
            'com_subd_id' => $request->subd_id,
            'employee_id' => session('loginId')
        ]);

        //$compl = ComplainantModel::orderBy('id', 'desc')->take(1)->value('id');
        //return redirect(route('complainants.show', $compl))->with('message', 'Complaint Created Successfully');


        $id =  ComplainantModel::orderBy('id', 'desc')->take(1)->value('id');

        return redirect(route('complainants.show', $id));

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $compl = ComplainantModel::where('id', '=', $id)->first();
        return view('views.viewComplainant', ['compl' => $compl]);
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

    public function exportcomplainants(Request $request)
    {
        $request->validate([
            'com_fname' => 'required',
            'com_lname' => 'required',
            'com_contact' => 'required',
            'com_address' => 'required',
            'def_name' => 'required',
            'def_contact' => 'required',
            'def_address' => 'required',
            'date_rep' => 'required',
            'brgy' => 'required'
        ]);
        $data = [
            'title' => 'Complainant',
            'date' => $request->date_rep,
            'compName' => $request->com_fname . ' '. $request->com_lname,
            'conNum' => $request->com_contact,
            'compAddress' => $request->com_address,
            'brgy' => $request->brgy,
            

        ];

        

        $pdf = Pdf::loadView('pdfTemplate.complaintTemp', $data);
        return $pdf->download($request->com_fname. '_'. $request->com_lname. '.pdf');
    }

    public function getPdf()
    {
        $data = [
            'title' => 'example title',
            'date' => date('m/d/Y'),
            'compName' => 'Tanio, Randmart L.',
            'conNum' => '099706479345',
            'mun' => 'Davao City',
            'brgy' => 'Buhangin(Prob)',
            'subd' => 'Zone 1 San Vicente'

        ];

        $pdf = Pdf::loadView('pdfTemplate.complaintTemp', $data);
        return $pdf->download('test.pdf');

    }
}
