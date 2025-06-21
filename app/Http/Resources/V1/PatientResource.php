<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {

        return [
            'id_Patient' =>  $this->id,
            'medicalHisory' =>  $this->historyCode,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at'=> $this->deleted_at,
            //'personal_data' => new PersonResource($this->person)

        ];
    }

}
