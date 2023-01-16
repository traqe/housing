<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StandClass extends Model
{
    protected $table = 'tblstandclasses';
    protected $fillable = ['class'];
    public $timestamps = false;
}
