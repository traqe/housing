<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $table='StudYear';
    protected $fillable =['StudYear'];

    public $timestamps = false;

    public function classes()
    {
        return $this->hasMany(GradeClass::class,'AcYear','StudYear');
    }

    public  function gradesubject()
    {
        return $this->hasOne('App\GradeSubject');
    }
}
