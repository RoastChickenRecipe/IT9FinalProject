<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class incidentRequest extends FormRequest
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
            'mun_id' => 'required',
            'brgy_id' => 'required',
            'rep_date' => 'required',
            'empId' => 'required',
            'location' => 'required',
            'dates_time' => 'required',

            'typeOfIncident' => 'required',
            'description' => 'required',
            'involved' => 'nullable',
            'action_taken' => 'nullable'
        ];
    }

    public function messages()
    {
        return [
            'mun_id.required' => 'This field is required',
            'rep_date.required' => 'This field is required',
            'description.required' => 'This field is required',
            'location.required' => 'This field is required',
            'typeOfIncident.required' => 'This field is required',
        ];
    }
}
