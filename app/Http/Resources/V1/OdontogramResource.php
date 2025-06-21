<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OdontogramResource extends JsonResource
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
            'history_id' => $this->history_id,
            'convention_id' => $this->convention_id,
            'tooth' => $this->tooth,
            'surface' => $this->surface,
            'convention' => [
                "id" => $this->convention->id,
                "name" => $this->convention->name,
                "image" => $request->root() .'/storage/conventions/'. $this->convention->image,
                "rule" => $this->convention->rule,
                "identifier" => $this->convention->identifier,
            ]
        ];
    }
}
