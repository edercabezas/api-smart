<?php

namespace App\Transformers\V1\Doctor;

use League\Fractal\TransformerAbstract;

class DoctorSaveTransformer extends TransformerAbstract
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
    public function transform()
    {
        return [
            //
        ];
    }

    public static function originalAttribute($index)
    {
        $attributes = [
            'idPerson' => 'id',
            'documentTypeId' => 'type_document_id',
            'documentNumber' => 'document',
            'firstName' => 'one_name',
            'lastName' => 'lastname_one',
            'middleName' => 'name_two',
            'middleLastName' => 'lastname_two',
            'birthDate' => 'birth_date',
            'genderPerson' => 'gender',
            'numberPhone' => 'phone',
            'landline' => 'landline',
            'email' => 'mail',
            'personalAddress' => 'address',
            'weight' => 'weight',
            'height' => 'height',
            'maritalStatus' => 'marital_status_id',
            'profession' => 'profession',
            'nearRelative' => 'near_relative',
            'nearRelativePhone' => 'near_relative_phone',
            'submitted' => 'submitted',
            'creationDate' => 'created_at',
            'updateDate' => 'updated_at',
            'deletedDate'=> 'deleted_at',
            "specialtyId" => 'specialty_id',
            "clinicId" => 'clinic_id',
            "codeDoctor" => 'code'
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }

    public static function transformedAttribute($index)
    {
        $attributes = [
            'id' => 'idPerson' ,
            'type_document_id' => 'documentTypeId' ,
            'document' => 'documentNumber' ,
            'one_name' => 'firstName' ,
            'lastname_one' => 'lastName' ,
            'name_two' => 'middleName' ,
            'lastname_two' => 'middleLastName' ,
            'birth_date' => 'birthDate' ,
            'gender' => 'genderPerson' ,
            'phone' => 'numberPhone' ,
            'landline' => 'landline' ,
            'mail' => 'email' ,
            'address' => 'personalAddress' ,
            'weight' => 'weight' ,
            'height' => 'height' ,
            'marital_status_id' => 'maritalStatus',
            'profession' => 'profession' ,
            'near_relative' => 'nearRelative' ,
            'near_relative_phone' => 'nearRelativePhone' ,
            'submitted' => 'submitted' ,
            "specialty_id" => 'specialtyId',
            "clinic_id" => 'clinicId',
            "code" => 'codeDoctor'
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}
