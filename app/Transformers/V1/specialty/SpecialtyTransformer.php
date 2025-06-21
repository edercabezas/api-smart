<?php

namespace App\Transformers\V1\specialty;

use App\Models\Specialty;
use League\Fractal\TransformerAbstract;

class SpecialtyTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected array $defaultIncludes = [
        //
    ];

    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected array $availableIncludes = [
        //
    ];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Specialty $specialty)
    {
        return [
            "idSpecialty" => $specialty->id,
            "name" => $specialty->name,
            "codeSpecialty" => $specialty->code,
            "description" => $specialty->description,
            "creationDate" => $specialty->created_at,
            "updatedDate" => $specialty->updated_at,
        ];
    }

    public static function originalAttribute($index)
    {
        $attributes = [
            "idSpecialty" => 'id',
            "name" => 'name',
            "codeSpecialty" => 'code',
            "description" => 'description',
            "creationDate" => 'created_at',
            "updatedDate" => 'updated_at',
        ];

        return isset($attributes[$index]) ? $attributes[$index]  : null;
    }

    public static function transformedAttribute($index)
    {
        $attributes = [
             'id' => "idSpecialty",
             'name' => "name",
             'code' => "codeSpecialty",
             'description' => "description",
             'created_at' => "creationDate",
             'updated_at' => "updatedDate",
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}
