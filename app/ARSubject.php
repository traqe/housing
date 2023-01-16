<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ARSubject extends Model
{
    protected $table = 'ARSubject';

    protected $primaryKey = 'ARSID';
    protected $fillable = ['','','','','','','',''];
    public $timestamps = false;

    public function Acad1()
    {
        return $this->hasMany(ARAcad1::class, 'ARSID', 'ARSID');
    }
    public function Col()
    {
        return $this->hasMany(ARAssCol::class, 'ARSID', 'ARSID');
    }
    public function ColMid()
    {
        return $this->hasMany(ARAssCol::class, 'ARSID', 'ARSID')->where('ColHeading', 'MT');
    }
    public function teacher()
    {
        return $this->belongsTo(Staff::class, 'Teach1ID', 'StaffID');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'SubjID','SubjID');
    }

}
