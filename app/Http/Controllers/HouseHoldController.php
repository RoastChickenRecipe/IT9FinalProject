<?php

namespace App\Http\Controllers;

use App\Http\Requests\citizenForm;
use App\Models\BrgyModel;
use App\Models\CitizenModel;
use App\Models\HouseholdModel;
use App\Models\MunModel;
use App\Models\SubdModel;
use Cron\HoursField;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HouseHoldController extends Controller
{
    public function index(){
        $data = HouseholdModel::all();
        return view('interface.householdInterface', ['data' => $data]);
    }

    public function create(){
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
        
        $munData = MunModel::all()->toArray();
        $brgyData = BrgyModel::all()->toArray();
        $subdData = SubdModel::all()->toArray();
        return view('forms.createHousehold', [
            'mun' => $munData,
            'brgy' => $brgyData,
            'subd' => $subdData,
            'address' => $address
        ]);
    }

    public function store(citizenForm $request){
        $data = [
            'fname' => $request->fname,
            'mname' => $request->mname,
            'lname' => $request->lname,
            'suff' => $request->suff,        
            'sex' => $request->sex,
            'age' => $request->age,
            'religion' => $request->religion,
            'frole' => $request->frole,
            'bType' => $request->bType,
            'contactNumber' => $request->contactNumber,    
            'yrsOfResidency' => $request->yrsOfResidency,
            'birth' => $request->birth,
            'placeOfBirth' => $request->placeOfBirth,
            'educAttainment' => $request->educAttainment,
            'citStatus' => $request->citStatus,
            'empStatus' => $request->empStatus,
            'income' => $request->income
        ];
        HouseholdModel::create([
            'household_type' => $request->htype,
            'municipality_id' => $request->mun_id,
            'barangay_id' => $request->brgy_id,
            'subdivision_id' => $request->subd_id,
            'employee_id' => session('loginId')
        ]);
        $house = HouseholdModel::orderBy('id','desc')->take(1)->value('id');
        CitizenModel::create([
            'fname' => $request->fname,
            'mname' => $request->mname,
            'lname' => $request->lname,
            'suffix' => $request->suff,  
            'sex' => $request->sex,
            'age' => $request->age,
            'family_role' => $request->religion,
            'birth_date' => $request->birth,
            'place_of_birth' => $request->placeOfBirth,
            'blood_type' => $request->bType,
            'religion' => $request->religion,
            'contactNum' => $request->contactNumber,   
            'years_of_residency' => $request->yrsOfResidency,
            'educational_attainment' => $request->educAttainment,
            'citizen_status' => $request->citStatus,
            'employment_status' => $request->empStatus,
            'income' => $request->income,
            'household_id' => $house
        ]);
        $id = $house;
        return redirect(route('households.show', $id))->with('message', 'Household and Citizen/s Added Successfully');
    }

    public function show($id){
        $house = HouseholdModel::findOrFail($id);
        $munData = MunModel::where('id', '<>', $house->municipality_id)->get();
        $brgyData = BrgyModel::where('id', '<>', $house->barangay_id)->get();
        $subdData = SubdModel::where('id', '<>', $house->subdivision_id)->get();
        $data = CitizenModel::query()->where('household_id', '=', $id)->get();

        $address = DB::table('municipalities')
                ->join('barangays', 'municipalities.id', 'barangays.municipality_id')
                ->join('subdivisions', 'barangays.id', 'subdivisions.barangay_id')
                ->select('municipalities.id AS mun_id',
                        'barangays.id AS brgy_id',
                        'subdivisions.id AS subd_id',
                        'municipalities.mun_name',
                        'barangays.brgy_name',
                        'subdivisions.subd_name')
                ->where('subdivisions.id', '<>', $house->subdivision_id)
                ->orderBy('mun_name', 'ASC')
                ->orderBy('brgy_name', 'ASC')
                ->orderBy('subd_name', 'ASC')
                ->get();
        
        return view('views.viewHousehold', ['getCitizen' => $data, 'house' => $house,
            'mun' => $munData,
            'brgy' => $brgyData,
            'subd' => $subdData,
            'address' => $address]);
    }
    
    public function edit($id){
        //
    }

    public function update(Request $request, $id){
        $request->validate([
            'householdType' => 'required|max:100',
            'mun_id' => 'required',
            'brgy_id' => 'required',
            'subd_id' => 'required'
        ],[
            'householdType.required' => 'This Field is Required',
            'householdType.max' => 'Cannot Exceed to 100 Characters'
        ]);

        HouseholdModel::findOrFail($id)->update([
            'household_type' => $request->householdType,
            'municipality_id' => $request->mun_id,
            'barangay_id' => $request->brgy_id,
            'subdivision_id' => $request->subd_id,
            'employee_id' => session('loginId')
        ]);

        return redirect(route('households.show', $id))->with('message', 'Household Updated Successfully');
    }

    public function destroy($id){
        HouseholdModel::findOrFail($id)->delete();
        return redirect(route('households.index'));
    }
    
}
