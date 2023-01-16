<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table='DICDepartment';
    protected $primaryKey='RowID';
    public $timestamps = false;
    protected $fillable=['Department','RowID'];

    public function head()
    {
        return $this->hasMany(DepartmentHead::class,'Department','Department');
    }
}
