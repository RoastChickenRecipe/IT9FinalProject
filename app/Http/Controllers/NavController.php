<?php

namespace App\Http\Controllers;

use App\Models\HouseholdModel;
use App\Models\MunModel;
use App\Models\SubdModel;
use Illuminate\Http\Request;

class NavController extends Controller
{
    
    public function viewDashboard(){
        return view('interface.dashboardInterface');
    }

    public function viewAddress(){
        $data = MunModel::all();
        return view('interface.addressInterface', ["data" => $data]);
    }

    public function viewHousehold(){
        $data = HouseholdModel::all();
        return view('interface.householdInterface', ['data' => $data]);
    }


}
