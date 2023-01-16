<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentClass extends Model
{
    public $table = 'TTClassStud';

    public $timestamps = false;

    protected  $primaryKey='ClStID';

    public $fillable = [
        'Class',
        'TermYear',
        'Term',
        'AcYear',
        'StudID'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, "StudID", "StudentID");
    }

}
