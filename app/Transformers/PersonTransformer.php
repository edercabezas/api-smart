<?php

namespace App\Transformers;

use App\Models\Person;
use League\Fractal\TransformerAbstract;

class PersonTransformer extends TransformerAbstract
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
    public function transform(Person $person)
    {
        return [
            'idPerson' => $person->id,
            'typeDocument' => $person->type_document_id,
            'numberDocument' => $person->document,
            'firstName' => $person->name_one,
            'secondName' => $person->name_two,
            'firstSurname' => $person->lastname_one,
            'secondSurname' => $person->lastname_two,
            'birthDate' => $person->birth_date,
            'gender' => $person->gender,
            'cellPhone' => $person->phone,
            'landline' => $person->landline,
            'email' => $person->mail,
            'address' => $person->address,
            'weight' => $person->weight,
            'height' => $person->height,
            'maritalStatus' => $person->marital_status_id,
            'activityOrProfession' => $person->profession,
            'closestRelative' => $person->near_relative,
            'closestRelativePhone' => $person->near_relative_phone,
            'forwarded' => $person->submitted,
            'creationDate' => $person->created_at,
            'updateDate' => $person->updated_at,
            'deletedDate' => isset($person->deleted_at) ? (string)$person->deleted_at : null,
        ];
    }

    public static function originalAttribute($index)
    {
        $attributes = [
            'idPerson' => 'id',
            'typeDocument' => 'type_document_id',
            'numberDocument' => 'document',
            'firstName' => 'name_one',
            'secondName' => 'name_two',
            'firstSurname' => 'lastname_one',
            'secondSurname' => 'lastname_two',
            'birthDate' => 'birth_date',
            'gender' => 'gender',
            'cellPhone' => 'phone',
            'landline' => 'landline',
            'email' => 'mail',
            'address' => 'address',
            'weight' => 'weight',
            'height' => 'height',
            'maritalStatus' => 'marital_status_id',
            'activityOrProfession' => 'profession',
            'closestRelative' => 'near_relative',
            'closestRelativePhone' => 'near_relative_phone',
            'forwarded' => 'submitted',
            'creationDate' => 'created_at',
            'updateDate' => 'updated_at',
            'deletedDate'=> 'deleted_at'
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }

    public static function transformedAttribute($index)
    {
        $attributes = [
              'id' => 'idPerson',
              'type_document_id' => 'typeDocument',
              'document' => 'numberDocument',
              'name_one' => 'firstName',
              'name_two' => 'secondName' ,
              'lastname_one' => 'firstSurname',
              'lastname_two' => 'secondSurname',
              'birth_date' => 'birthDate',
              'gender' => 'gender',
              'phone' => 'cellPhone',
              'landline' => 'landline',
              'mail' => 'email',
              'address' => 'adress',
              'weight' => 'weight',
              'height' => 'height',
              'marital_status_id' => 'maritalStatus',
              'profession' => 'activityOrProfession',
              'near_relative' => 'closestRelative',
              'near_relative_phone' => 'closestRelativePhone',
              'submitted' => 'forwarded',
              'created_at' => 'creationDate',
              'updated_at' => 'updateDate',
              'deleted_at' => 'deletedDate',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}
