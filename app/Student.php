<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Student extends Model
{
    protected $table = 'Students';

    public $timestamps = false;

    protected  $primaryKey ='StudentID';

    public $fillable = [
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

    public function parent()
    {
        return $this->belongsTo(Parents::class, 'ParentID', 'ParentID');
    }

    public  function studentClass()
    {
        return $this->hasMany(StudentClass::class, 'StudID', 'StudentID');
    }

    public function Acad1()
    {
        return $this->hasMany(ARAcad1::class, 'StudID', 'StudentID');
    }

    public function ARAAttend()
    {
        return $this->hasMany(ARAAttend::class, 'StudID', 'StudentID');
    }

    public function hasNoCurrentRecord()
    {
        $currentSession = Term::where('Closed', 0)->first();
        return ($this->studentClass()->where(['TermYear'=>$currentSession->TermYear, 'Term'=>$currentSession->Term])->first() != null ? True : false);
    }

    public function registration()
    {
        return $this->hasMany(StudTerm::class, 'StudentID', 'StudentID')->orderBy('TermYear','Desc')->orderBy('Term','Desc');
    }

    public function getLastRegRecord()
    {
        return $this->registration()->first();
    }

    public function getClass($year, $term)
    {
        return $this->studentClass()->where(['TermYear'=>$year, 'Term'=>$term])->first()->Class ??'';
    }

    public function getGrade($year, $term)
    {
        return $this->studentClass()->where(['TermYear'=>$year, 'Term'=>$term])->first();//->AcYear;
    }


    public function getCurrentClass()
    {
        $currentSession = Term::where('Closed', 0)->first();
        return $this->studentClass();//->where(['TermYear'=>$currentSession->Year, 'Term'=>$currentSession->Term])->first();
    }

//
//
//    public function person()
//    {
//        return $this->belongsTo('App\Person');
//    }
//
//    public function studentgrade()
//    {
//        return $this->hasOne('App\StudentGrade');
//    }
//    public function studentbalance()
//    {
//        return $this->hasOne('App\StudentBalance','student_id', 'candidatenumber');
//    }
//
//    public function fees()
//    {
//        return $this->belongsToMany('App\FeeStructure', 'tbltransaction', 'student_id', 'fee_id','candidatenumber');
//    }
//
//    public function hasAnyFee($fees)
//    {
//        if (is_array($fees))
//        {
//            foreach ($fees as $fee)
//            {
//                if ($this->hasFee($fee))
//                {
//                    return true;
//                }
//            }
//        }
//        else
//        {
//            if ($this->hasFee($fees))
//            {
//                return true;
//            }
//        }
//        return false;
//    }
//
//    public function hasFee($fee)
//    {
//        if ($this->fees()->where('fee_id', $fee)->first())
//        {
//            return true;
//        }
//        return false;
//    }

}
