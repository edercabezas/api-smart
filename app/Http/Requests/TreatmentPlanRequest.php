<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TreatmentPlanRequest extends FormRequest
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
            "*.odontogram_id" => 'required',
            "*.dental_procedure_id" => 'required',
            "*.history_id" => 'numeric|nullable',
            "*.value" => 'required|numeric',
            "*.resolved" => 'required|boolean',
            "*.comments" => 'string|nullable'
        ];
    }
}
