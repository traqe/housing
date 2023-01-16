<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StandType extends Model
{
    protected $table = 'tblstandtypes';
    protected $fillable = ['type'];
    public $timestamps = false;
}
