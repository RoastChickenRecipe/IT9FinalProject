<?php

namespace App\Http\Controllers;
use App\Models\BrgyModel;
use App\Models\MunModel;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MunController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = MunModel::all();
        return view('interface.addressInterface', ["data" => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('forms.addMunForm');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'munName' => ['required',
                            'max:50',
                            Rule::unique('municipalities', 'mun_name')
                            ->where('region', $request->input('region'))],
            'region' => 'required|max:10'
        ] , [
            'munName.required' => '*This Field is Required',
            'munName.unique' => 'Name Already Added',
            'munName.max' => 'Maximum Name of 50 Characters',
            'region.required' => '*This Field is Required',
            'region.max' => 'Maximum Characters is 10',
        ]);

        MunModel::create([
            'mun_name' => $request->munName,
            'region' => $request->region
        ]);

        $red = MunModel::orderBy('id', 'desc')->take(1)->get();
        return redirect(route('municipality.show', $red))
        ->with('message', $request->munName . 'Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = MunModel::findOrFail($id);
        $brgyData = BrgyModel::where('municipality_id', '=', $id)->get();    
        return view('views.viewMun', [
            'data' => $data,
            'brgyData' => $brgyData
        ]);
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
        $request->validate([
            'munName' => ['required',
                            'max:50',
                            Rule::unique('municipalities', 'mun_name')
                            ->where('region', $request->input('region'))],
            'region' => 'required|max:10'
        ] , [
            'munName.required' => '*This Field is Required',
            'munName.unique' => 'Name with Similar Region Already Existed',
            'munName.max' => 'Maxximum Name of 50 Characters',
            'region.required' => '*This Field is Required',
            'region.max' => 'Maxximum Characters is 10',
        ]);

        MunModel::findOrFail($id)->update([
            'mun_name' => $request->munName,
            'region' => $request->region
        ]);

        
        return redirect(route('municipality.show', $id))
        ->with('message', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        MunModel::findOrFail($id)->delete();
        return redirect(route('municipality.index'));
    }
}
