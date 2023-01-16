<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimeTable extends Model
{
    protected  $table ='TTables';
    protected $fillable =['TermYear'
        ,'Term'
        ,'TTName'
        ,'CreatedOn'
        ,'CreatedBy'
       ];
    public $timestamps = false;
    protected $primaryKey='TTID';

    public function subjectgroup()
    {
        return $this->hasMany(SubjectGroup::class, 'TTID','TTID');
    }


//,'Periods'
//,'Days'
//,'Portal'
//,'HolidayType'
//,'PeriodAttend'
//,'Footer'
//,'SyncTT'
//,'PeriodAttendDay'
//,'TTStartDay'
//,'DynamicPeriod'
//,'Status'
//,'NoEmptyClasses'
//,'PlannerID'

}
