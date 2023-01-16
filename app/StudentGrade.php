<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentGrade extends Model
{
    protected $table ='tblstudentgrade';
    protected $fillable =['student_id','grade_id','year','term','created_by','updated_by','updated_at','status'];

    public function student()
    {
        return $this->belongsTo('App\Student','student_id');
    }
    public function grade()
    {
        return $this->belongsTo('App\Grade', 'grade_id');
    }

}
