<?php

namespace App\Repositories;

use App\Models\Student;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class StudentRepository
 * @package App\Repositories
 * @version January 13, 2020, 3:21 pm UTC
 *
 * @method Student findWithoutFail($id, $columns = ['*'])
 * @method Student find($id, $columns = ['*'])
 * @method Student first($columns = ['*'])
*/
class StudentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'FirstName',
        'LastName',
        'MiddleName',
        'OtherNames',
        'Gender',
        'BirthDate',
        'PassNo',
        'BirthPlace',
        'Photo',
        'StatusID',
        'StatusDate',
        'ParentID',
        'RelationID',
        'LivingWithID',
        'Address',
        'NationalityID',
        'ReligionID',
        'StudType',
        'LangChoice',
        'LearnStyleVis',
        'LearnStyleAud',
        'LearnStyleKin',
        'Keyword',
        'Reentrant',
        'Repeating',
        'Age',
        'Password',
        'Disabled',
        'Email',
        'PWExpire',
        'Cell',
        'AdmNo',
        'WaitListID',
        'CASRefl',
        'NatID2',
        'Country',
        'FT1',
        'FT2',
        'StaffID',
        'DebitOrder',
        'Gender2',
        'CreatedOn',
        'CreatedBy',
        'UpdatedOn',
        'UpdatedBy',
        'RepCardsNo',
        'SiblingOrder',
        'UserName',
        'IncCensus',
        'LMSBGColor',
        'MealCharge',
        'IsPOS',
        'PID',
        'Imported',
        'ImportedOn',
        'OAID',
        'ExtSystem',
        'PassReset',
        'AboutMe',
        'SyncDate',
        'SyncStatus',
        'PaymentStatus'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Student::class;
    }
}
