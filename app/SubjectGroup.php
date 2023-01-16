<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubjectGroup extends Model
{
    protected $primaryKey='OptGroupID';
    protected $fillable=[
        'TTID'
        ,'AcYear'
        ,'GroupName'
        ,'SubjSel'
        ,'Operator'
        ,'Seq'
        ,'Note'
        ,'SubjSelMin'
        ,'OGID'
    ];

    protected $table = 'TTOptSubjGroups';
    public $timestamps = false;

    public function  timetable()
    {
        return $this->belongsTo(TimeTable::class, 'TTID', 'TTID');
    }
}
