<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class complainantRequest extends FormRequest
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
            'com_fname' => 'required|max:50',
            'com_lname' => 'required|max:50',
            'com_conNum' => 'required|max:12',
            'defendant' => 'required',
            'defContact' => 'nullable|max:12',
            'defAddress' => 'nullable',
            'rep_date' => 'required',
            'mun_id' => 'required',
            'brgy_id' => 'required',
            'subd_id' => 'required'
        ];
    }

    public function messages(){
        return [
            'com_fname.required' => 'This Field is Required',
            'com_fname.max' => 'Cannot Exceed to 50 Characters',
            'com_lname.required' => 'This Field is Required',
            'com_lname.max' => 'Cannot Exceed to 50 Characters',
            'com_conNum.required' => 'This Field is Required',
            'com_conNum.max' => 'Cannot Exceed to 12 Characters',
            'address.required' => 'This Field is Required',
            'defendant.required' => 'This Field is Required',
            'defContact.required' => 'This Field is Required',
            'defContact.max' => 'Cannot Exceed to 12 Characters',
            'defAddress.required' => 'This Field is Required',
            'rep_date.required' => 'This Field is Required',
            'mun_id.required' => 'This Field is Required',
        ];
    }
}
