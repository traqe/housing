<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ARCommStudent extends Model
{
    protected $table = 'ARCommStudent';
    protected $fillable=['CommSetupID','StudentID','Comment'];
    public $timestamps = false;

    public function student()
    {
        return $this->belongsTo(Student::class, 'StudentID', 'StudentID');
    }

    public function commentSetup()
    {
        return $this->belongsTo(ARCommSetup::class, 'CommSetupID', 'CommSetupID');
    }

}
