<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TypeHistoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $forms = null;

        if ($this) {
            $forms = $this->forms()
                ->with('questions', 'questions.validations')
                ->with(['formHistoryComplete' => function ($query) {
			        $query->where('history_id', '=', $this->historyId);
		        }])
	            ->with(['questions.answer' => function ($query) {
			        $query->where('history_id', '=', $this->historyId);
		        }])
                ->get();
        }

        return [
            'type' => $this->name,
            'forms' => FormResource::collection($forms)
        ];
    }
}
