<?php

namespace App\Transformers\V1\Doctor;

use App\Models\Doctor;
use League\Fractal\TransformerAbstract;

class DoctorTransformer extends TransformerAbstract
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
    public function transform(Doctor $doctor)
    {

        return [
            'idDoctor' => $doctor->id,
            'codeDoctor' => $doctor->code,
            'doctorName' => $doctor->person->fullname,
            'doctorGender' => $doctor->person->gender,
            'ageDocotor' => $doctor->person->age,
            'specialty' => $doctor->specialty->name,
            'image' => 'assets/images/user-fake-female.jpg',
            'created_at' => $doctor->created_at,
            'updated_at' => $doctor->updated_at,
            'deleted_at'=> isset($doctor->deleted_at) ? $doctor->deleted_at : null,
        ];
    }


    public static function originalAttribute($index)
    {
        $attributes = [
            'idDoctor' =>  'id',
            'codeDoctor' =>  'code',
            'creationDate' => 'created_at',
            'updateDate' => 'updated_at',
            'deletedDate'=> 'deleted_at'
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }

    public static function transformedAttribute($index)
    {
        $attributes = [
          'id' => 'idDoctor' ,
          'code' => 'codeDoctor' ,
          'created_at' => 'creationDate' ,
          'updated_at' => 'updateDate' ,
          'deleted_at' => 'deletedDate' ,
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}
