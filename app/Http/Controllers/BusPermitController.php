<?php

namespace App\Http\Controllers;

use App\Http\Requests\busPermitRequest;
use App\Models\BusPermitModel;
use App\Models\EmployeeModel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class BusPermitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $data = BusPermitModel::orderBy('created_at', 'ASC')->get();
        return view('interface.busPermitInterface', ['busData' => $data]);
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
        $emp = EmployeeModel::findOrFail(session('loginId'));
        return view('forms.createBusPermit', ['address' => $address, 'emp' => $emp]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(busPermitRequest $request)
    {
        $docFormat = $request->fname . '_' . $request->mname . '_' . $request->lname . '(' . date("d-m-Y") . ')';
        $path = 'uploadFiles/files/';

        $content = ['dticdaCertFile', 'busPermitFile', 'brgyClearanceFile', 'ctcFile', 'contOfLeaseFile','zoningClearanceFile',
                    'sanitaryFile', 'fireSafetyFile', 'bfadFile'];
        $fileformat = [$request->get_dticdaCertFile, $request->get_busPermitFile, $request->get_brgyClearanceFile, $request->get_ctcFile, $request->get_contOfLeaseFile,
                    $request->get_zoningClearanceFile, $request->get_sanitaryFile, $request->get_fireSafetyFile, $request->get_bfadFile];

        $filenames = [];

        for($i = 0;$i < 9; $i++){
            if($request->has($content[$i])){
                $file = $request->file($content[$i]);
                $extention = $file->getClientOriginalExtension();
                $filenames[] = $fileformat[$i]. '_'. $docFormat .'.'.$extention;
                $file->move($path, $filenames[$i]);
            }else{
                $filenames[] = '';
            }
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
            'dti_cda_cert' => $filenames[0],
            'bus_mayor_permit' => $filenames[1],
            'brgy_clearance' => $filenames[2],
            'comm_tax_cert' => $filenames[3],
            'k_of_lease' => $filenames[4],
            'zoning_clearance' => $filenames[5],

            'sanitary_permit' => $filenames[6],
            'fire_safety_permit' => $filenames[7],
            'bfad_permit' => $filenames[8],

            'mun_id' => $request->mun_id,
            'brgy_id' => $request->brgy_id,
            'subd_id' => $request->subd_id,
            'employee_id' => $request->empId
        ]);
        


        return redirect(route('business-permits.index'));
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = BusPermitModel::findOrFail($id);
        return view('views.viewBusPermit', ['busData' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = BusPermitModel::findOrFail($id);
        $address = DB::table('municipalities')
                    ->join('barangays', 'municipalities.id', 'barangays.municipality_id')
                    ->join('subdivisions', 'barangays.id', 'subdivisions.barangay_id')
                    ->select('municipalities.id AS mun_id',
                            'barangays.id AS brgy_id',
                            'subdivisions.id AS subd_id',
                            'municipalities.mun_name',
                            'barangays.brgy_name',
                            'subdivisions.subd_name')
                    ->where('subdivisions.id', '<>', $data->subd_id)
                    ->orderBy('mun_name', 'ASC')
                    ->orderBy('brgy_name', 'ASC')
                    ->orderBy('subd_name', 'ASC')
                    ->get();
        $emp = EmployeeModel::findOrFail(session('loginId'));
        return view('forms.editBusPermit', ['busData' => $data, 'address' => $address, 'emp' => $emp]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(busPermitRequest $request, string $id)
    {
        $category = BusPermitModel::findOrFail($id);
        $docFormat = $request->fname . '_' . $request->mname . '_' . $request->lname . '(' . date("d-m-Y") . ')';
        $path = 'uploadFiles/files/';
        
        $content = ['dticdaCertFile', 'busPermitFile', 'brgyClearanceFile', 'ctcFile', 'contOfLeaseFile','zoningClearanceFile',
                    'sanitaryFile', 'fireSafetyFile', 'bfadFile'];
        
        $allfiles = [$category->dti_cda_cert, $category->bus_mayor_permit,$category->brgy_clearance,$category->comm_tax_cert,$category->k_of_lease,
                    $category->zoning_clearance,$category->sanitary_permit,$category->fire_safety_permit,$category->bfad_permit];

        $fileformat = [$request->get_dticdaCertFile, $request->get_busPermitFile, $request->get_brgyClearanceFile, $request->get_ctcFile, $request->get_contOfLeaseFile,
                        $request->get_zoningClearanceFile, $request->get_sanitaryFile, $request->get_fireSafetyFile, $request->get_bfadFile];

        $filenames = [];

        for($i = 0;$i < 9; $i++){
            if($request->has($content[$i])){

                $file = $request->file($content[$i]);
                $extention = $file->getClientOriginalExtension();
                $filenames[] = $fileformat[$i]. $docFormat .'.'.$extention;
                $file->move($path, $filenames[$i]);

                if(File::exists($path.$allfiles[$i])){
                    File::delete($path.$allfiles[$i]);
                }
            }else{       
                if($allfiles[$i] != ''){   
                    $filenames[] = $allfiles[$i];
                    
                }else{
                    $filenames[] = '';
                }   
            }
        }

        $category->update([
            'b_fname' => $request->fname,
            'b_mname' => $request->mname,
            'b_lname' => $request->lname,
            'b_contactNum' => $request->contactNum,
            'b_age' => $request->age,
            'b_birthDate' => $request->bDate,

            'bus_structure' => $request->bStructure,
            'dti_cda_cert' => $filenames[0],
            'bus_mayor_permit' => $filenames[1],
            'brgy_clearance' => $filenames[2],
            'comm_tax_cert' => $filenames[3],
            'k_of_lease' => $filenames[4],
            'zoning_clearance' =>  $filenames[5],

            'sanitary_permit' => $filenames[6],
            'fire_safety_permit' => $filenames[7],
            'bfad_permit' => $filenames[8],

            'mun_id' => $request->mun_id,
            'brgy_id' => $request->brgy_id,
            'subd_id' => $request->subd_id,
            'employee_id' => $request->empId
        ]);
        
        return redirect(route('business-permits.show', $id))->with('message', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $path = 'uploadFiles/files/';
        $category = BusPermitModel::findOrFail($id);
        $allfiles = [$category->dti_cda_cert, $category->bus_mayor_permit,$category->brgy_clearance,$category->comm_tax_cert,$category->k_of_lease,
                    $category->zoning_clearance,$category->sanitary_permit,$category->fire_safety_permit,$category->bfad_permit];
        for($i = 0;$i < 9; $i++){
            if(File::exists($path.$allfiles[$i])){
                File::delete($path.$allfiles[$i]);
            }
        }
        
        $category->delete();
        return redirect(route('business-permits.index'));
    }

    public function exportBusPermit(Request $request){
        $request->validate(['busPermitId' => 'required']);

        $get = BusPermitModel::findOrFail($request->busPermitId);

        $data = [
            'title' => 'Business-Permit',
            'get_id' => $get->id,
            'date' => date('F d, Y'),
            'name' => $get->b_fname. ' '. $get->b_mname. ' '. $get->b_lname,
            'busType' => $get->bus_structure,
            'address' => $get->BusToMun->mun_name. ' '. $get->BusToSubd->subd_name . ', '. $get->BusToBrgy->brgy_name,
            'mun' => $get->BusToMun->mun_name
        ];

        $pdf = Pdf::loadView('pdfTemplate.busPermitTemp', $data);
        return $pdf->download(date('d-m-Y')."_". $get->bus_structure. "_". $get->b_fname. '_'. $get->b_mname. '_'. $get->b_lname. '.pdf');
    }

}
