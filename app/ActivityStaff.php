<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityStaff extends Model
{
    //

    protected $table = 'ACMActStaff';
    public $timestamps = false;
    public $primaryKey = 'ActID';


    public $fillable = ['ActID','StaffID'];

    public function staff(){
        return $this->belongsTo(Staff::class,'StaffID','StaffID');
    }
}
