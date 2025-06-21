<?php

namespace App\Transformers\V1\Patient;

use App\Models\Patient;
use DateTime;
use League\Fractal\TransformerAbstract;

class PatientSaveTransformer extends TransformerAbstract
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

        // 'type_document_id',
		// 'document',
		// 'one_name',
		// 'lastname_one',
        // 'name_two',
        // 'lastname_two',
		// 'birth_date',
		// 'gender',
		// 'phone',
		// 'landline',
		// 'mail',
		// 'address',
		// 'weight',
		// 'height',
		// 'profession',
		// 'near_relative',
		// 'near_relative_phone',
		// 'submitted'

        return [];

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

    public static function transformedAttribute($index)
    {
        $attributes = [
            'id' => 'idPatient',
            'historyCode' => 'medicalHistory',
            'fullname' => 'fullName',
            'currentData' => '',
            'names' => 'names',
            'lastname_one' => 'firstSurname',
            'lastname_two' => 'secondSurname',
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
