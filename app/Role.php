<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table='tblroles';
    //protected $primaryKey='RoleID';
    protected $fillable = ['role'];
}
