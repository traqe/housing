<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubjectSetup extends Model
{
    
    public $timestamp = false;
    protected $fillable = ['SSYear'
    ,'AcYear'
    ,'SubjectID'
    ,'SSType'
    ,'Seq'
    ,'DoublePeriod'
    ,'SinglePeriod'
    ,'TriplePeriod'
//    ,'TotalPeriod'
    ,'Term'
    ,'Description'
    ,'CAS'
    ,'Exam'
    ,'SCode'
    ,'SubjName'
    ,'Title'
    ,'Idea'
    ,'DSC'
    ,'Lvl'
    ,'Department'
    ,'GradeDesc'
    ,'Graded'
    ,'AcadType'
    ,'YearSeq'
    ,'Page'
    ,'ThemeDesc'
    ,'KeyConcepts'
    ,'SubjWeight'
    ,'GBType'
    ,'RepCard'
    ,'NoExam'
    ,'NoComms'
    ,'ExtCode'
    ,'Combine'
    ,'CombineSubj'
    ,'IsHeader'
    ,'PSSID'
    ,'PassMark'
    ,'ARMenu'
    ,'SubjSign'
    ,'ImageFile'
    ,'Credits'
    ,'ScheduleNo'
    ,'KeyStage'
    ,'CritSetID'
    ,'CritStyleID'
    ,'AnRep'
    ,'SubjCost'
    ,'Currency'
    ,'GBBoundaries'
    ,'IsUI'
    ,'CritOtherRuleIsOff'
    ,'CriteriaHistory'
    ,'CriteriaBasedCalc'
    ,'ExtExamSeq'
    ,'SBAWeight'
    ,'SBARaw'
    ,'SASAMSSync'];

    protected $PrimaryKey = 'SSID';
    protected $table = 'SubjSetup';
    public  $timestamps = false;
}
