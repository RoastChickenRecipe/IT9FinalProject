<?php

namespace App\Http\Controllers;

use App\Http\Requests\citizenForm;
use App\Models\BrgyModel;
use App\Models\CitizenModel;
use App\Models\HouseholdModel;
use App\Models\MunModel;
use App\Models\SubdModel;
use Cron\HoursField;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HouseHoldController extends Controller
{
    public function index(){

    }

    public function create(){

        $munData = MunModel::all()->toArray();
        $brgyData = BrgyModel::all()->toArray();
        $subdData = SubdModel::all()->toArray();

        return view('forms.createForm', [
            'mun' => $munData,
            'brgy' => $brgyData,
            'subd' => $subdData
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
            'municipality_id' => $request->s_mun,
            'barangay_id' => $request->s_brgy,
            'subdivision_id' => $request->s_subd,
            'employee_id' => session('loginId')
        ]);

        $house = HouseholdModel::orderBy('id','desc')->take(1)->value('id');

        foreach($data['fname'] as $index => $row){
            CitizenModel::create([
                'fname' => $data['fname'][$index],
                'mname' => $data['mname'][$index],
                'lname' => $data['lname'][$index],
                'suffix' => $data['suff'][$index],

                'sex' => $data['sex'][$index],
                'age' => $data['age'][$index],
                'family_role' => $data['frole'][$index],
                'birth_date' => $data['birth'][$index],
                'place_of_birth' => $data['placeOfBirth'][$index],
                'blood_type' => $data['bType'][$index],
                'religion' => $data['religion'][$index],

                'contactNum' => $data['contactNumber'][$index],
                'years_of_residency' => $data['yrsOfResidency'][$index],
                'educational_attainment' => $data['educAttainment'][$index],
                'citizen_status' => $data['citStatus'][$index],
                'employment_status' => $data['empStatus'][$index],
                'income' => $data['income'][$index],

                'household_id' => $house
            ]);
        }
        
        return redirect(view('views.viewHousehold'));

    }

    public function show($id){

        $house = HouseholdModel::query()->where('id' , '=', $id)->first();
        $data = CitizenModel::query()->where('household_id', '=', $id)->get();
        return view('views.viewHousehold', ['getCitizen' => $data, 'house' => $house]);

    }
    
    public function edit($id){

    }

    public function update(){

    }

    public function destroy(){

    }
    /*
    public function viewfamily($id){
        //added
        $house = HouseholdModel::query()->where('id' , '=', $id)->first();
        $data = CitizenModel::query()->where('household_id', '=', $id)->get();
        return view('views.viewHousehold', ['getCitizen' => $data, 'house' => $house]);
    }

    public function createForm(){
        //added
        $munData = MunModel::all()->toArray();
        $brgyData = BrgyModel::all()->toArray();
        $subdData = SubdModel::all()->toArray();

        return view('forms.createForm', [
            'mun' => $munData,
            'brgy' => $brgyData,
            'subd' => $subdData
        ]);
    }

    public function createHousehold(citizenForm $request){
        /added
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
            'municipality_id' => $request->s_mun,
            'barangay_id' => $request->s_brgy,
            'subdivision_id' => $request->s_subd,
            'employee_id' => session('loginId')
        ]);

        $house = HouseholdModel::orderBy('id','desc')->take(1)->value('id');

        foreach($data['fname'] as $index => $row){
            CitizenModel::create([
                'fname' => $data['fname'][$index],
                'mname' => $data['mname'][$index],
                'lname' => $data['lname'][$index],
                'suffix' => $data['suff'][$index],

                'sex' => $data['sex'][$index],
                'age' => $data['age'][$index],
                'family_role' => $data['frole'][$index],
                'birth_date' => $data['birth'][$index],
                'place_of_birth' => $data['placeOfBirth'][$index],
                'blood_type' => $data['bType'][$index],
                'religion' => $data['religion'][$index],

                'contactNum' => $data['contactNumber'][$index],
                'years_of_residency' => $data['yrsOfResidency'][$index],
                'educational_attainment' => $data['educAttainment'][$index],
                'citizen_status' => $data['citStatus'][$index],
                'employment_status' => $data['empStatus'][$index],
                'income' => $data['income'][$index],

                'household_id' => $house
            ]);
        }
        
        return redirect(route('hholdView'));
    }
    */
    


    

}
