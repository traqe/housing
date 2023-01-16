<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GradeClass extends Model
{
//    protected $table='tblgrades';
//    protected $fillable =['grade_id','classname','year','term','staff_id'];

    protected $table='TTClasses';
    protected $fillable =['Class','ClYear','ClTerm','AcYear','TeacherID'];
    protected  $primaryKey = 'RowID';

    public $timestamps = false;


    public  function level()
    {
        return $this->belongsTo(Grade::class, 'AcYear', 'grade');
    }

    public function teacher()
    {
        return $this->belongsTo(Staff::class, 'TeacherID','StaffID');
    }

    public function studentClass($term, $year)
    {
        return $this->hasMany(StudentClass::class, 'Class', 'Class')->where(['Term'=>'1', 'TermYear'=>'2020'])->get();
    }

    public function students()
    {
        return $this->hasManyThrough(
        Student::class,
        StudentClass::class,
        'Class', // Foreign key on users table...
        'StudentID', // Foreign key on posts table...
        'id', // Local key on countries table...
        'id' // Local key on users table...
        );

//        return $this->hasManyThrough(
//            'App\Post',
//            'App\User',
//            'country_id', // Foreign key on users table...
//            'user_id', // Foreign key on posts table...
//            'id', // Local key on countries table...
//            'id' // Local key on users table...
//        );
//


    }

}
