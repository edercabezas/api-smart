<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PersonResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'typeDocument' => $this->type_document_id,
            'numberDocument' => $this->document,
            'firstName' => $this->name_one,
            'secondName' => $this->name_two,
            'firstSurname' => $this->lastname_one,
            'secondSurname' => $this->lastname_two,
            'birthDate' => $this->birth_date,
            'age' => $this->age,
            'gender' => $this->gender,
            'cellPhone' => $this->phone,
            'landline' => $this->landline,
            'email' => $this->mail,
            'address' => $this->address,
            'weight' => $this->weight,
            'height' => $this->height,
            'profession' => $this->profession,
            'nearRelative' => $this->near_relative,
            'nearRelativePhone' => $this->near_relative_phone,
            'maritalStatus' => $this->marital_status_id,
            'submitted' => $this->submitted,
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
            'deletedAt' => $this->deleted_at
        ];
    }
}
