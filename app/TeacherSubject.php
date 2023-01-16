<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeacherSubject extends Model
{
    protected $table = 'tblteachersubject';
    protected $fillable = ['teacher_id','grade_subject_id','updated_at','created_by','updated_by'];

    public function gradesubject()
    {
        return $this->belongsTo('App\GradeSubject');
    }

    public function teacher()
    {
        return $this->belongsTo('App\Teacher');
    }

}
