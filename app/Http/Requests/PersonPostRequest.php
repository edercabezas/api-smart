<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonPostRequest extends FormRequest
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
            'type_document_id'   => 'required|integer',
            'document' => 'required|string',
            'name_one' => 'required|string',
            'name_two' => 'nullable|string',
            'lastname_one' => 'nullable|string',
            'lastname_two' =>'nullable|string',
            'birth_date' => 'required|date',
            'gender' => 'nullable|string',
            'phone' => 'nullable|string',
            'landline' => 'nullable|string',
            'mail' => 'nullable|email',
            'address' => 'nullable|string',
            'weight' => 'nullable|numeric',
            'height' => 'nullable|numeric',
            'profession' => 'nullable|string',
            'near_relative' => 'nullable|string',
            'near_relative_phone' => 'nullable|string',
            'submitted' => 'nullable|boolean',
        ];
    }
}
