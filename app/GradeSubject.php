<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GradeSubject extends Model
{
    protected $table = 'tblgradesubject';
    protected $fillable=['grade_id','subject_id','updated_by','created_by','updated_at','year','term'];

    public function subject()
    {
        return $this->belongsTo('App\Subject');
    }
    public function grade()
    {
        return $this->belongsTo('App\Grade');
    }
    public function teachersubject()
    {
        return $this->hasOne('App\TeacherSubject');
    }


}
