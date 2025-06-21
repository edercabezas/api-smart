<?php

namespace App\Transformers\V1\Patient;

use App\Http\Resources\V1\PersonResource;
use App\Models\Patient;
use League\Fractal\TransformerAbstract;

class PatientTransformer extends TransformerAbstract
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
    public function transform(Patient $patient)
    {
        return [
            'idPatient' =>  (int)$patient->id,
            'medicalHistory' =>  (string)$patient->historyCode,
            'fullName' => (string)$patient->person->fullname,
            'gender' => $patient->person->gender,
            'birthday' => $patient->person->birth_date,
            'image' => 'assets/images/user-fake-female.jpg',
            'creationDate' => (string)$patient->created_at,
            'updateDate' => (string)$patient->updated_at,
            'deletedDate'=> isset($patient->deleted_at) ? (string)$patient->deleted_at : null,
            'person' => new PersonResource($patient->person)
        ];
    }

    public static function originalAttribute($index)
    {
        $attributes = [
            'idPatient' =>  'id',
            'medicalHistory' =>  'historyCode',
            'fullName' =>  'fullname',
            'currentData' => '',
            'firstName' => 'name_one',
            'secondName' => 'name_two',
            'firstSurname' =>  'lastname_one',
            'secondSurname' =>  'lastname_two',
            'gender' =>  'gender',
            'birthday' =>  'birth_date',
            'age' =>  'age',
            'weight' =>  'weight',
            'height' =>  'height',
            'typeDocument' =>  'type_document_id',
            'numberDocument' =>  'document',
            'landline' =>  'landline',
            'cellPhone' =>  'phone',
            'address' =>  'address',
            'email' =>  'mail',
            'maritalStatus' =>  'marital_status_id',
            'activityOrProfession' =>  'profession',
            'closestRelative' =>  'near_relative',
            'closestRelativePhone' =>  'near_relative_phone',
            'forwarded' =>  'submitted',
            'image' => 'image',
            'creationDate' =>  'created_at',
            'updateDate' =>  'updated_at',
            'deletedDate'=> 'deleted_at',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
    // public static function originalAttributes()
    // {
    //     $attributes = [
    //         'id',
    //          'historyCode',
    //          'fullname',
    //          'names',
    //          'lastname_one',
    //          'lastname_two',
    //          'gender',
    //          'birth_date',
    //          'age',
    //          'weight',
    //          'height',
    //          'type_document_id',
    //          'document',
    //          'landline',
    //          'phone',
    //          'address',
    //          'mail',
    //          'marital_status_id',
    //          'profession',
    //          'near_relative',
    //          'near_relative_phone',
    //          'submitted',
    //         'image',
    //          'created_at',
    //          'updated_at',
    //          'deleted_at',
    //     ];

    //     return $attributes;
    // }

    public static function transformedAttribute($index)
    {
        $attributes = [
            'id' => 'idPatient',
            'historyCode' => 'medicalHistory',
            'fullname' => 'fullName',
            'currentData' => '',
            'firstName' => 'name_one',
            'secondName' => 'name_two',
            'firstSurname' =>  'lastname_one',
            'secondSurname' =>  'lastname_two',
            'gender' => 'gender',
            'birth_date' => 'birthday',
            'age' => 'age',
            'weight' => 'weight',
            'height' => 'height',
            'type_document_id' => 'typeDocument',
            'document' => 'numberDocument',
            'landline' => 'landline',
            'phone' => 'cellPhone',
            'address' => 'address',
            'mail' => 'email',
            'marital_status_id' => 'maritalStatus',
            'profession' => 'activityOrProfession',
            'near_relative' => 'closestRelative',
            'near_relative_phone' => 'closestRelativePhone',
            'submitted' => 'forwarded',
            'image' => 'image',
            'created_at' => 'creationDate',
            'updated_at' => 'updateDate' ,
            'deleted_at' => 'deletedDate',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}
