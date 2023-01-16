<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DepartmentHead extends Model
{
    protected $table='DICDepartmentHeads';
    public $timestamps = false;
    protected $fillable=['Department','StaffID','Seq'];
}
