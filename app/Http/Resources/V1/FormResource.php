<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FormResource extends JsonResource
{
	/**
	 * Transform the resource into an array.
	 *
	 * @return array<string, mixed>
	 */
	public function toArray(Request $request): array
	{
		// Se filtran las preguntas que sean de tipo footer
		$footer = $this->questions
			->filter(function ($question) {
				return $question->type === 'footer';
			})
			->values()
			->toArray();

		// Se filtran las preguntas que no sean de tipo footer
		$questions = $this->questions
			->reject(function ($question) {
				return $question->type === 'footer';
			});

		// Agrupar preguntas por el atributo "row" y las ordeno por el atributo "order"
		$questions = $this->questions
			->sortBy('row')
			->sortBy('order')
			->groupBy('row');

		// Mapear las preguntas agrupadas para darles el formato deseado
		$rows = $questions
			->map(function ($questions, $row) {
				return ['columns' => $questions->toArray()];
			})
			->values()
			->toArray();

		return [
			'id' => $this->id,
			'name' => $this->name,
			'errorMessage' => $this->errorMessage,
			'classes' => $this->classes,
			'rows' => $rows,
            'formStatus' => count($this->formHistoryComplete) ? 'saved' : 'pending',//saved | pending
			'footer' => [
				'classes' => 'row form-footer__actions',
				'buttons' => $footer,
			]
		];
	}
}
