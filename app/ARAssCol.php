<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ARAssCol extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'ARAssColID';
    protected $table = 'ARAssCol';
    protected $fillable =[
        'ARSID'
        ,'ARAssColPID'
        ,'ColHeading'
        ,'Title'
        ,'Weight'
        ,'OutOf'
        ,'ColDate'
        ,'NoWeight'
        ,'Seq'
        ,'Lvl'
        ,'CanEdit'
        ,'RepType'
        ,'Report'
        ,'Show'
        ,'ActDate'
        ,'ImageName'
        ,'ARAssColIDOld'
        ,'Descript'
        ,'YM'
        ,'YMWeight'
        ,'TopMarksNo'
        ,'ExamFrom'
        ,'ExamTo'
        ,'VenueID'
        ,'ExamFormat'
        ,'Pages'
        ,'AttendRegister'
        ,'SupplementaryFor'
        ,'PubStatus'
        ,'Footer'
        ,'AssType'
        ,'PortalAssessment'
        ,'PortalResult'
        ,'TaskType'
        ,'TaskWeight'
    ];

    public function colData()
    {
        return $this->hasMany(ARAssColData::class, 'ARAssColID', 'ARAssColID');
    }
}
