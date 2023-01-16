<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ARAttend extends Model
{
    protected $table='ARAttend';
    protected  $fillable =[
        'TermYear'
        ,'Term'
        ,'StudID'
        ,'Attend1'
        ,'Attend2'
        ,'Comment1'
        ,'Comment2'
        ,'Comment3'
        ,'StudComm1'
        ,'StudComm2'
        ,'StudComm3'
        ,'StudComm4'
        ,'Attend3'
        ,'AttitudeID'
        ,'Status'
        ,'HWork'
        ,'Comment4'
        ,'Comment5'
        ,'HouseComm'
        ,'HouseComm2'
        ,'Comment6'
        ,'TutorComm1'
        ,'TutorComm2'
        ,'TutorComm3'
        ,'BoardComm1'
        ,'BoardComm2'
        ,'BoardComm3'
        ,'Promotion'
        ,'Attend4'
        ,'YMPromoCode'
        ,'YMPromotion'
        ,'YMFlag'
        ,'ORMark'
        ,'ORGrade'
        ,'YMPromotionLL'
        ,'NoMarks'
        ,'TMark1'
        ,'TMark2'
        ,'TMark3'
        ,'TMark4'
        ,'TMark5'
        ,'TGrade1'
        ,'TGrade2'
        ,'TGrade3'
        ,'TGrade4'
        ,'TGrade5'
        ,'WAMark'
        ,'WAGrade'
        ,'WAFlag'
        ,'Stamp'
        ,'Comment7'
        ,'Comment8'
        ,'Comment9'
        ,'Comment10'
        ,'Comment11'
        ,'Comment12'
        ,'Comment13'
        ,'Comment14'
        ,'Comment15'
    ];
    public $timestamps = false;
    protected $primaryKey ='ARAttID';
}
