<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\BusPermitModel;
use App\Models\CitizenModel;
use App\Models\ComplainantModel;
use App\Models\HouseholdModel;
use App\Models\IncidentModel;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $citizenCount = CitizenModel::count();
        $householdCount = HouseholdModel::count();
        $complaintCount = ComplainantModel::count();
        $permitCount = BusPermitModel::count();
        $incidentCount = IncidentModel::count();

        $recentCitizens = CitizenModel::latest()->take(5)->get();

        $citizens = CitizenModel::select('birth_date', 'sex')->get();

        $ageBrackets = [
            'minor' => 0,
            'adult' => 0,
            'senior' => 0,
        ];
        $sexSummary = [
            'male' => 0,
            'female' => 0,
        ];

        foreach ($citizens as $citizen) {
            $age = Carbon::parse($citizen->birthdate)->age;

            // Age brackets
            if ($age < 18) {
                $ageBrackets['minor']++;
            } elseif ($age < 60) {
                $ageBrackets['adult']++;
            } else {
                $ageBrackets['senior']++;
            }

            // Sex summary
            if (strtolower($citizen->sex) === 'male') {
                $sexSummary['male']++;
            } elseif (strtolower($citizen->sex) === 'female') {
                $sexSummary['female']++;
            }
        }

        return view('interface.dashboardInterface', compact(
            'citizenCount',
            'householdCount',
            'complaintCount',
            'permitCount',
            'incidentCount',
            'recentCitizens',
            'ageBrackets',
            'sexSummary'
        ));
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
        //
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
