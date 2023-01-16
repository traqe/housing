<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ARCommSetup extends Model
{
    protected $table='ARCommSetup';
    protected $fillable=[
        'TermYear'
        ,'Term'
        ,'StudYear'
        ,'Heading'
        ,'HeadingRep'
        ,'Type'
        ,'MinSize'
        ,'MaxSize'
        ,'Seq'
        ,'Status'
        ,'IsMandatory'
        ,'Reference'
        ,'DataType'
        ,'SetID'
        ,'CommBankID'
        ,'SubjCommBank'
        ,'CopyPrevComment'
        ,'IsImage'
        ,'CalcType'
        ,'CommDuplication'
        ,'CommPerson'
        ,'ShowGrade'
        ,'OverallResult'
        ,'ResultAnalysis'
        ,'IsSummary'
        ,'PromoRule'
    ];
    protected $primaryKey='CommSetupID';
    public $timestamps = false;

    public function comments()
    {
        return $this->hasMany(ARCommStudent::class, 'CommSetupID', 'CommSetupID');
    }


}
