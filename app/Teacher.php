<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table ='tblteacher';
    protected $fillable =['person_id','ecnumber','department_id','position','activities','created_by','updated_by','updated_at'];


    public function person()
    {
        return $this->belongsTo('App\Person');
    }
    public function department()
    {
        return $this->belongsTo('App\Department');
    }

    public function teachersubject()
    {
        return $this->hasOne('App\TeacherSubject');
    }

}
