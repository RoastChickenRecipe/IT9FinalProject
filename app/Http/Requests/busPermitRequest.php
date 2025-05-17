<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class busPermitRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'fname' => 'required|max:100',
            'mname' => 'required|max:50',
            'lname' => 'required|max:50',
            'contactNum' => 'required|digits_between:10,13',
            'age' => 'required|integer|gt:17',
            'bDate' => 'required',

            'bStructure' => 'required',

            'dticdaCertFile' => 'nullable',
            'get_dticdaCertFile' => 'required',
            'busPermitFile' => 'nullable',
            'get_busPermitFile' => 'required',
            'brgyClearanceFile' => 'nullable',
            'get_brgyClearanceFile' => 'required',
            'ctcFile' => 'nullable',
            'get_ctcFile' => 'required',
            'contOfLeaseFile' => 'nullable',
            'get_contOfLeaseFile' => 'required',
            'zoningClearanceFile' => 'nullable',
            'get_zoningClearanceFile' => 'required',

            'sanitaryFile' => 'nullable',
            'get_sanitaryFile' => 'nullable',
            'fireSafetyFile' => 'nullable',
            'get_fireSafetyFile' => 'nullable',
            'bfadFile' => 'nullable',
            'get_bfadFile' => 'nullable',
            
            'mun_id' => 'required',
            'brgy_id' => 'required',
            'subd_id' => 'required',
            'empId' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'fname.required' => 'This field is required',
            'mname.required' => 'This field is required',
            'lname.required' => 'This field is required',
            'contactNum.required' => 'This field is required',
            'contactNum.digits_between' => '10 - 13 character only.',
            'age.required' => 'This field is required',
            'bDate.required' => 'This field is required',

            'bStructure.required' => 'This field is required',

            'get_dticdaCertFile.required' => 'A File is required',
            'get_busPermitFile.required' => 'A File is required',
            'get_brgyClearanceFile.required' => 'A File is required',
            'get_ctcFile.required' => 'A File is required',
            'get_contOfLeaseFile.required' => 'A File is required',
            'get_zoningClearanceFile.required' => 'A File is required',
            
            'mun_id.required' => 'This field is required',
            'empId.required' => 'This field is required'
        ];
    }
}
