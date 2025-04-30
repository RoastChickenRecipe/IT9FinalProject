<?php

namespace App\Http\Controllers;

use App\Models\BusPermitModel;
use Illuminate\Http\Request;

class BusPermitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('interface.busPermitInterface');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('forms.createBusPermit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fname' => 'required|max:100',
            'mname' => 'required|max:50',
            'lname' => 'required|max:50',
            'address' => 'required|max:200',
            'contactNum' => 'required|max:15',
            'age' => 'required|max:3',
            'bDate' => 'required',

            'bStructure' => 'required',
            'dticdaCertFile' => 'required',
            'busPermitFile' => 'required',
            'brgyClearanceFile' => 'required',
            'ctcFile' => 'required',
            'contOfLeaseFile' => 'required',
            'zoningClearanceFile' => 'required',

            'sanitaryFile' => 'nullable',
            'fireSafetyFile' => 'nullable',
            'bfadFile' => 'nullable'
        ]);
        $docFormat = $request->fname . '_' . $request->mname . '_' . $request->lname . '(' . time() . ')';
        $path = 'uploadFiles/files/';
        $sanitaryFilefilename = '';
        $fireSafetyFilefilename = '';
        $bfadFilefilename = '';

        if($request->has('dticdaCertFile')){
            $dticdaCertFilefile = $request->file('dticdaCertFile');
            $dticdaCertFileextention = $dticdaCertFilefile->getClientOriginalExtension();
            $dticdaCertFilefilename = 'DTI/CDA_Certificate_'. $docFormat .'.'.$dticdaCertFileextention;
            $dticdaCertFilefile->move($path, $dticdaCertFilefilename);
        }
        if($request->has('busPermitFile')){
            $busPermitFilefile = $request->file('busPermitFile');
            $busPermitFileextention = $busPermitFilefile->getClientOriginalExtension();
            $busPermitFilefilename = 'BusinessPermit_'. $docFormat .'.'.$busPermitFileextention;
            $busPermitFilefile->move($path, $busPermitFilefilename);
        }
        if($request->has('brgyClearanceFile')){
            $brgyClearanceFilefile = $request->file('brgyClearanceFile');
            $brgyClearanceFileextention = $brgyClearanceFilefile->getClientOriginalExtension();
            $brgyClearanceFilefilename = 'Brgy.Clearance_'. $docFormat .'.'.$brgyClearanceFileextention;
            $brgyClearanceFilefile->move($path, $brgyClearanceFilefilename);
        }
        if($request->has('ctcFile')){
            $ctcFilefile = $request->file('ctcFile');
            $ctcFileextention = $ctcFilefile->getClientOriginalExtension();
            $ctcFilefilename = 'CTC_'. $docFormat .'.'.$ctcFileextention;
            $ctcFilefile->move($path, $ctcFilefilename);
        }
        if($request->has('contOfLeaseFile')){
            $contOfLeaseFilefile = $request->file('contOfLeaseFile');
            $contOfLeaseFileextention = $contOfLeaseFilefile->getClientOriginalExtension();
            $contOfLeaseFilefilename = 'k.OfLease/TitleOfLand_'. $docFormat .'.'.$contOfLeaseFileextention;
            $contOfLeaseFilefile->move($path, $contOfLeaseFilefilename);
        }
        if($request->has('zoningClearanceFile')){
            $zoningClearanceFilefile = $request->file('zoningClearanceFile');
            $zoningClearanceFileextention = $zoningClearanceFilefile->getClientOriginalExtension();
            $zoningClearanceFilefilename = 'ZoningClearance_'. $docFormat .'.'.$zoningClearanceFileextention;
            $zoningClearanceFilefile->move($path, $zoningClearanceFilefilename);
        }

        if($request->has('sanitaryFile')){
            $sanitaryFilefile = $request->file('sanitaryFile');
            $sanitaryFileextention = $sanitaryFilefile->getClientOriginalExtension();
            $sanitaryFilefilename = 'SanitaryPermit_'. $docFormat .'.'.$sanitaryFileextention;
            $sanitaryFilefile->move($path, $sanitaryFilefilename);
        }
        if($request->has('fireSafetyFile')){
            $fireSafetyFilefile = $request->file('fireSafetyFile');
            $fireSafetyFileextention = $fireSafetyFilefile->getClientOriginalExtension();
            $fireSafetyFilefilename = 'FireSafetyPermit_'. $docFormat .'.'.$fireSafetyFileextention;
            $fireSafetyFilefile->move($path, $fireSafetyFilefilename);
        }
        if($request->has('bfadFile')){
            $bfadFilefile = $request->file('bfadFile');
            $bfadFileextention = $bfadFilefile->getClientOriginalExtension();
            $bfadFilefilename = 'BFAD_Permit_'. $docFormat .'.'.$bfadFileextention;
            $bfadFilefile->move($path, $bfadFilefilename);
        }

        
        BusPermitModel::create([
            'b_fname' => $request->fname,
            'b_mname' => $request->mname,
            'b_lname' => $request->lname,
            'b_address' => $request->address,
            'b_contactNum' => $request->contactNum,
            'b_age' => $request->age,
            'b_birthDate' => $request->bDate,

            'bus_structure' => $request->bStructure,
            'dti_cda_cert' => $request->$path.$dticdaCertFilefilename,
            'bus_mayor_permit' => $request->$path.$busPermitFilefilename,
            'brgy_clearance' => $request->$path.$brgyClearanceFilefilename,
            'comm_tax_cert' => $request->$path.$ctcFilefilename,
            'k_of_lease' => $request->$path.$contOfLeaseFilefilename,
            'zoning_clearance' => $request->$path.$zoningClearanceFilefilename,

            'sanitary_permit' => $request->$path.$sanitaryFilefilename,
            'fire_safety_permit' => $request->$path.$fireSafetyFilefilename,
            'bfad_permit' => $request->$path.$bfadFilefilename,

            'employee_id' => session('loginId')
        ]);
        


        return redirect(route('business-permits.index'));
        
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
