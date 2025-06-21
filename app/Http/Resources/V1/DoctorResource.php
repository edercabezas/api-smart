<?php

namespace App\Http\Resources\V1;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DoctorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        $birthDate = $this['personalData']->birth_date;
        $ageDiff = Carbon::parse($birthDate)->diff(Carbon::now());
        $years = $ageDiff->y;
        $months = $ageDiff->m;
        $days = $ageDiff->d;
        return [
            'doctor' => [
                'code' => $this['doctor']->code,
                'name' => $this['personalData']->fullName,
                'age' => "Edad: $years años, $months meses y $days días.",
                'date_birth' => $this['personalData']->birth_date,
                'mail' => $this['personalData']->mail

            ],

            'clinic' => $this['clinic'],
            'specialty' => $this['specialty']
        ];
    }
}
