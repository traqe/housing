<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentSet extends Model
{

    protected $table = 'TTOptGrpStud';
    public $primaryKey = 'OGStID';
    protected $fillable = ['StudID','OGSID'];
    public $timestamps = false;

    public function student()
    {
        return $this->belongsTo(Student::class ,'StudID','StudentID')->orderby('LastName');
    }

}
