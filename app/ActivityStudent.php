<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityStudent extends Model
{
    protected $table = 'ACMActivityStud';
    public $timestamps = false;
    public $primaryKey = 'ASID';

    public $fillable = ['ActID','StudentID','Comment1'];

    public function student()
    {
        return $this->belongsTo(Student::class, 'StudentID','StudentID');
    }
    public function activity()
    {
        return $this->belongsTo(TermActivity::class, 'ActID','ActID');
    }

}
