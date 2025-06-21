<?php

namespace App\Transformers\V1\Patient;

use App\Models\Patient;
use League\Fractal\TransformerAbstract;

class PatientFullTransformer extends TransformerAbstract
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
            'currentData' => '',
            'firstName' => $patient->person->name_one,
            'secondName' => $patient->person->name_two,
            'firstSurname' => $patient->person->lastname_one,
            'secondSurname' => $patient->person->lastname_two,
            'gender' => $patient->person->gender,
            'birthday' => $patient->person->birth_date,
            'age' => $patient->person->age,
            'weight' => $patient->person->weight,
            'height' => $patient->person->height,
            'typeDocument' => $patient->person->type_document_id,
            'numberDocument' => $patient->person->document,
            'landline' => $patient->person->landline,
            'cellPhone' => $patient->person->phone,
            'address' => $patient->person->address,
            'email' => $patient->person->mail,
            'maritalStatus' => $patient->person->marital_status_id,
            'activityOrProfession' => $patient->person->profession,
            'closestRelative' => $patient->person->near_relative,
            'closestRelativePhone' => $patient->person->near_relative_phone,
            'forwarded' => $patient->person->submitted,
            'image' => 'assets/images/user-fake-female.jpg',
            'creationDate' => (string)$patient->created_at,
            'updateDate' => (string)$patient->updated_at,
            'deletedDate'=> isset($patient->deleted_at) ? (string)$patient->deleted_at : null,
        ];
    }
}
