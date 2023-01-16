<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubjectSet extends Model
{
    public $timestamp = false;
    protected $fillable = ['OGID','SubjID','Teacher1ID','Teacher2ID','SSID','Section'];
    public $primaryKey = 'OGSID';
    protected $table = 'TTOptGrpSubj';
    public $timestamps = false;


   
    public function yearterm()
    {
        return $this->belongsTo(SetYearTerm::class, "OGID", "OGID");
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, "SubjID", "SubjID");
    }
    public function teacher()
    {
        return $this->belongsTo(Staff::class, "Teacher1ID", "StaffID");
    }
    public function subjectsetup()
    {
        return $this->belongsTo(SubjectSetup::class, "SSID", "SSID");
    }

    public function students()
    {
        return $this->hasMany(StudentSet::class, 'OGSID','OGSID');
    }
}
