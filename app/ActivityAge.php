<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityAge extends Model
{
    protected $table = 'ACMActGroup';
    public $timestamps = false;
    public $primaryKey = 'ActGroupID';

    public $fillable = [
    'ActType'
    ,'BirthDate'
    ,'ActGroup'];
}
