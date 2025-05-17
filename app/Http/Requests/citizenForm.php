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
            'age' => 'required|digits_between:1,3|integer|gt:1',
            'religion' => 'required|max:50',
            'frole' => 'required|max:50',
            'bType' => 'required',
            'contactNumber' => 'required|digits_between:10,13',
            
            'yrsOfResidency' => 'required|integer|min:0|max:150',
            'birth' => 'required|max:50',
            'placeOfBirth' => 'required|max:50',
            'educAttainment' => 'required|max:100',

            'citStatus' => 'max:100',
            'empStatus' => 'required|max:100',
            'income' => 'required|numeric|min:0'
            
        ];
    }

    public function messages(){
        return [
            
            'htype.required' => 'This field is required.',
            'address.required' => 'This field is required.',
            'fname.required' => 'This field is required.',
            'lname.required' => 'This field is required.',
            'mname.required' => 'This field is required.',
            'suff.required' => 'This field is required.',
            
            'sex.required' => 'This field is required.',
            'age.required' => 'This field is required.',
            'age.integer' => 'Age must be a number.',
            'age.min' => 'Age must not be 0.',
            'age.digits_between' => '1 - 3 charater only.',
            'religion.required' => 'This field is required.',
            'frole.required' => 'This field is required.',
            'bType.required' => 'This field is required.',
            'contactNumber.required' => 'This field is required.',
            'contactNumber.numeric' => 'Must be a number.',
            'contactNumber.digits_between' => '10 - 13 character only.',
            
            'yrsOfResidency.required' => 'This field is required.',
            'yrsOfResidency.integer' => 'Must be a number.',
            'yrsOfResidency.min' => 'Cannot be negative.',
            'birth.required' => 'This field is required.',
            'placeOfBirth.required' => 'This field is required.',
            'educAttainment.required' => 'This field is required.',

            'citStatus.required' => 'This field is required.',
            'empStatus.required' => 'This field is required.',
            'income.required' => 'This field is required.',
            'income.min' => 'Income cannot be negative.'
        ];
    }
}
