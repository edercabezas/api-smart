<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientPostRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [

            'documentTypeId' => 'required|integer',
            'document' => 'required|string',
            'firstName' => 'required|string',
            'lastName' => 'nullable|string',
            'middleName' => 'required|string',
            'middleLastName' =>'nullable|string',
            'birthDate' => 'required|date',
            'gender' => 'required|string',
            'phone' => 'required|string',
            'landline' => 'nullable|string',
            'email' => 'required|email',
            'address' => 'required|string',
            'weight' => 'nullable|numeric',
            'height' => 'nullable|numeric',
            'profession' => 'nullable|string',
            'nearRelative' => 'nullable|string',
            'nearRelativePhone' => 'nullable|string',
            'submitted' => 'nullable|boolean',

        ];
    }
}
