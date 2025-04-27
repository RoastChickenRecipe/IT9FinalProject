<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class citizenForm extends FormRequest
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
            'htype' => 'required|max:50',
            
            'address' => 'required',
            'mun_id' => 'required',
            'brgy_id' => 'required',
            'subd_id' => 'required',

            'fname' => 'required|max:50',
            'lname' => 'required|max:50',
            'mname' => 'required|max:50',
            'suff' => 'max:10',
            
            'sex' => 'required|max:10',
            'age' => 'required|max:10',
            'religion' => 'required|max:50',
            'frole' => 'required|max:50',
            'bType' => 'required',
            'contactNumber' => 'required|max:15',
            
            'yrsOfResidency' => 'required|max:50',
            'birth' => 'required|max:50',
            'placeOfBirth' => 'required|max:50',
            'educAttainment' => 'required|max:100',

            'citStatus' => 'max:100',
            'empStatus' => 'required|max:100',
            'income' => 'required'
            
        ];
    }

    public function messages(){
        return [
            
            'htype.required' => 'This field is required.',
            'fhead.required' => 'This field is required.',
            'address.required' => 'This field is required.'
        ];
    }
}
