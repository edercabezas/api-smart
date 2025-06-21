<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HistoryFullResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'                   => $this->id,
            'patient_id'           => $this->patient_id,
            'doctor_id'            => $this->doctor_id,
            'parent_id'            => $this->parent_id,
            'history_type_id'      => $this->history_type_id,
            'consultation_reasons' => $this->consultation_reasons,
            'physical_exam'        => $this->physical_exam,
            'diagnosis'            => $this->diagnosis,
            'treatment'            => $this->treatment,
            'observations'         => $this->observations,
            'personal_history'     => $this->personal_history,
            'family_history'       => $this->family_history,
            'current_conditions'   => $this->current_conditions,
            'allergies'            => $this->allergies,
            'medications'          => $this->medications,
            'created_at'           => $this->created_at,
            'updated_at'           => $this->updated_at,
            'evolutions'           => $this->evolutions,
            'typeHistory'              => [
                'id' => $this->type,

            ],
            'patient'              => [
                'id' => $this->patient->id,
                'name' => $this->patient->person->names
            ],
            'doctor'               => [
                'id' => $this->doctor->id,
                'name' => $this->doctor->person->names
            ],
        ];
    }
}
