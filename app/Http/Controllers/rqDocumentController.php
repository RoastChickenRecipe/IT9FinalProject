<?php

namespace App\Http\Controllers;

use App\Models\CitizenModel;
use App\Models\EmployeeModel;
use App\Models\rqDocumentModel;
use Illuminate\Http\Request;

class rqDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doc = rqDocumentModel::orderBy('issue_date', 'desc')->get();
        $cit = CitizenModel::all();
        $emp = EmployeeModel::findOrFail(session('loginId'));
        return view('interface.rqDocInterface', ['doc' => $doc, 'citizen' => $cit, 'emp' => $emp]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cit = CitizenModel::all();
        $emp = EmployeeModel::findOrFail(session('loginId'));
        return view('forms.crDocForm', ['citizen' => $cit, 'emp' => $emp]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'sel_cit' => 'required',
            'docType' => 'required|string'
        ],[
            'date.required' => 'This field is empty',
            'sel_cit.required' => 'This field is empty',
            'docType.required' => 'This field is empty'
        ]);
        rqDocumentModel::create([
            'document_type' => $request->docType,
            'issue_date' => $request->date,
            'citizen_id' => $request->sel_cit,
            'employee_id' => session('loginId')
        ]);

        return redirect(route('rqDocuments.index'));
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
        
        $data = rqDocumentModel::findOrFail($id);
        $cit = CitizenModel::where('id', '<>', $data->RqDocToCit->id)->get();
        $emp = EmployeeModel::findOrFail(session('loginId'));
        return view('forms.editDocForm', ['rqDocData' => $data, 'emp' => $emp, 'citizen' => $cit]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'date' => 'required',
            'sel_cit' => 'required',
            'docType' => 'required|string',
            'emp' => 'required',
        ],[
            'date.required' => 'This field is empty',
            'sel_cit.required' => 'This field is empty',
            'docType.required' => 'This field is empty'
        ]);

        rqDocumentModel::findOrFail($id)->update([
            'document_type' => $request->docType,
            'issue_date' => $request->date,
            'citizen_id' => $request->sel_cit,
            'employee_id' => $request->emp
        ]);
        return redirect(route('rqDocuments.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        rqDocumentModel::findOrFail($id)->delete();
        return redirect(route('rqDocuments.index'));
    }
}
