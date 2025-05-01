<?php

namespace App\Http\Controllers;

use App\Models\BusPermitModel;
use Illuminate\Http\Request;
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

        $content = ['dticdaCertFile', 'busPermitFile', 'brgyClearanceFile', 'ctcFile', 'contOfLeaseFile','zoningClearanceFile',
                    'sanitaryFile', 'fireSafetyFile', 'bfadFile'];
        $fileformat = ['DTI-CDA_Certificate_', 'BusinessPermit_', 'Brgy.Clearance_', 'CTC_', 'k.OfLease-TitleOfLand_',
                        'ZoningClearance_', 'SanitaryPermit_', 'FireSafetyPermit_', 'BFAD_Permit_'];

        $filenames = [];

        for($i = 0;$i < 9; $i++){
            if($request->has($content[$i])){
                $file = $request->file($content[$i]);
                $extention = $file->getClientOriginalExtension();
                $filenames[] = $fileformat[$i]. $docFormat .'.'.$extention;
                $file->move($path, $filenames[$i]);
            }else{
                $filenames[] = '';
            }
        }

        /*
        if($request->has('dticdaCertFile')){
            $dticdaCertFilefile = $request->file('dticdaCertFile');
            $dticdaCertFileextention = $dticdaCertFilefile->getClientOriginalExtension();
            $dticdaCertFilefilename = 'DTI-CDA_Certificate_'. $docFormat .'.'.$dticdaCertFileextention;
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
            $contOfLeaseFilefilename = 'k.OfLease-TitleOfLand_'. $docFormat .'.'.$contOfLeaseFileextention;
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
        */
        
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

            'employee_id' => session('loginId')
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = BusPermitModel::findOrFail($id);
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
            $dticdaCertFilefilename = 'DTI-CDA_Certificate_'. $docFormat .'.'.$dticdaCertFileextention;
            $dticdaCertFilefile->move($path, $dticdaCertFilefilename);

            if(File::exists($category->dti_cda_cert)){
                File::delete($category->dti_cda_cert);
            }
        }
        if($request->has('busPermitFile')){
            $busPermitFilefile = $request->file('busPermitFile');
            $busPermitFileextention = $busPermitFilefile->getClientOriginalExtension();
            $busPermitFilefilename = 'BusinessPermit_'. $docFormat .'.'.$busPermitFileextention;
            $busPermitFilefile->move($path, $busPermitFilefilename);

            if(File::exists($category->bus_mayor_permit)){
                File::delete($category->bus_mayor_permit);
            }
        }
        if($request->has('brgyClearanceFile')){
            $brgyClearanceFilefile = $request->file('brgyClearanceFile');
            $brgyClearanceFileextention = $brgyClearanceFilefile->getClientOriginalExtension();
            $brgyClearanceFilefilename = 'Brgy.Clearance_'. $docFormat .'.'.$brgyClearanceFileextention;
            $brgyClearanceFilefile->move($path, $brgyClearanceFilefilename);

            if(File::exists($category->brgy_clearance)){
                File::delete($category->brgy_clearance);
            }
        }
        if($request->has('ctcFile')){
            $ctcFilefile = $request->file('ctcFile');
            $ctcFileextention = $ctcFilefile->getClientOriginalExtension();
            $ctcFilefilename = 'CTC_'. $docFormat .'.'.$ctcFileextention;
            $ctcFilefile->move($path, $ctcFilefilename);

            if(File::exists($category->comm_tax_cert)){
                File::delete($category->comm_tax_cert);
            }
        }
        if($request->has('contOfLeaseFile')){
            $contOfLeaseFilefile = $request->file('contOfLeaseFile');
            $contOfLeaseFileextention = $contOfLeaseFilefile->getClientOriginalExtension();
            $contOfLeaseFilefilename = 'k.OfLease-TitleOfLand_'. $docFormat .'.'.$contOfLeaseFileextention;
            $contOfLeaseFilefile->move($path, $contOfLeaseFilefilename);

            if(File::exists($category->k_of_lease)){
                File::delete($category->k_of_lease);
            }
        }
        if($request->has('zoningClearanceFile')){
            $zoningClearanceFilefile = $request->file('zoningClearanceFile');
            $zoningClearanceFileextention = $zoningClearanceFilefile->getClientOriginalExtension();
            $zoningClearanceFilefilename = 'ZoningClearance_'. $docFormat .'.'.$zoningClearanceFileextention;
            $zoningClearanceFilefile->move($path, $zoningClearanceFilefilename);

            if(File::exists($category->zoning_clearance)){
                File::delete($category->zoning_clearance);
            }
        }

        if($request->has('sanitaryFile')){
            $sanitaryFilefile = $request->file('sanitaryFile');
            $sanitaryFileextention = $sanitaryFilefile->getClientOriginalExtension();
            $sanitaryFilefilename = 'SanitaryPermit_'. $docFormat .'.'.$sanitaryFileextention;
            $sanitaryFilefile->move($path, $sanitaryFilefilename);

            if(File::exists($category->sanitary_permit)){
                File::delete($category->sanitary_permit);
            }
        }
        if($request->has('fireSafetyFile')){
            $fireSafetyFilefile = $request->file('fireSafetyFile');
            $fireSafetyFileextention = $fireSafetyFilefile->getClientOriginalExtension();
            $fireSafetyFilefilename = 'FireSafetyPermit_'. $docFormat .'.'.$fireSafetyFileextention;
            $fireSafetyFilefile->move($path, $fireSafetyFilefilename);

            if(File::exists($category->fire_safety_permit)){
                File::delete($category->fire_safety_permit);
            }
        }
        if($request->has('bfadFile')){
            $bfadFilefile = $request->file('bfadFile');
            $bfadFileextention = $bfadFilefile->getClientOriginalExtension();
            $bfadFilefilename = 'BFAD_Permit_'. $docFormat .'.'.$bfadFileextention;
            $bfadFilefile->move($path, $bfadFilefilename);

            if(File::exists($category->bfad_permit)){
                File::delete($category->bfad_permit);
            }
        }

        $category->update([
            'b_fname' => $request->fname,
            'b_mname' => $request->mname,
            'b_lname' => $request->lname,
            'b_address' => $request->address,
            'b_contactNum' => $request->contactNum,
            'b_age' => $request->age,
            'b_birthDate' => $request->bDate,

            'bus_structure' => $request->bStructure,
            'dti_cda_cert' => $path.$dticdaCertFilefilename,
            'bus_mayor_permit' => $path.$busPermitFilefilename,
            'brgy_clearance' => $path.$brgyClearanceFilefilename,
            'comm_tax_cert' => $path.$ctcFilefilename,
            'k_of_lease' => $path.$contOfLeaseFilefilename,
            'zoning_clearance' => $path.$zoningClearanceFilefilename,

            'sanitary_permit' => $path.$sanitaryFilefilename,
            'fire_safety_permit' => $path.$fireSafetyFilefilename,
            'bfad_permit' => $path.$bfadFilefilename,

            'employee_id' => session('loginId')
        ]);
        


        return redirect(route('business-permits.index'));

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
        
        /*
        if(File::exists($category->dti_cda_cert)){
            File::delete($category->dti_cda_cert);
        }
        if(File::exists($category->bus_mayor_permit)){
            File::delete($category->bus_mayor_permit);
        }
        if(File::exists($category->brgy_clearance)){
            File::delete($category->brgy_clearance);
        }
        if(File::exists($category->comm_tax_cert)){
            File::delete($category->comm_tax_cert);
        }
        if(File::exists($category->k_of_lease)){
            File::delete($category->k_of_lease);
        }
        if(File::exists($category->zoning_clearance)){
            File::delete($category->zoning_clearance);
        }
        if(File::exists($category->sanitary_permit)){
            File::delete($category->sanitary_permit);
        }
        if(File::exists($category->fire_safety_permit)){
            File::delete($category->fire_safety_permit);
        }
        if(File::exists($category->bfad_permit)){
            File::delete($category->bfad_permit);
        }
        */
        $category->delete();
        return redirect(route('business-permits.index'));
    }

}
