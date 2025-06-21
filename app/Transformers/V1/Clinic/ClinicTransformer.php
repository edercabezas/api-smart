<?php

namespace App\Transformers\V1\Clinic;

use App\Models\Clinic;
use League\Fractal\TransformerAbstract;

class ClinicTransformer extends TransformerAbstract
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
    public function transform(Clinic $clinic)
    {
        return [
            "idClinic"  => $clinic->id,
            "name"  => $clinic->name,
            "direction" => $clinic->address,
            "contact" => $clinic->phone,
            "urlWeb" => $clinic->url_site,
            "creationDate" => $clinic->created_at,
            "updateDate" => $clinic->updated_at,
            "deletedDate" => $clinic->deleted_at
        ];
    }

    public static function originalAttribute($index)
    {
        $attributes = [
            "idClinic"  => 'id',
            "name"  => 'name',
            "direction" => 'address',
            "contact" => 'phone',
            "urlWeb" => 'url_site',
            "creationDate" => 'created_at',
            "updateDate" => 'updated_at',
            "deletedDate" => 'deleted_at'
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }

    public static function transformedAttribute($index)
    {
        $attributes = [
            'id' => "idClinic"  ,
            'name' => "name"  ,
            'address' => "direction" ,
            'phone' => "contact" ,
            'url_site' => "urlWeb" ,
            'created_at' => "creationDate" ,
            'updated_at' => "updateDate" ,
            'deleted_at' => "deletedDate"
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}
