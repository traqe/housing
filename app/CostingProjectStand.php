<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CostingProjectStand extends Model
{
    protected $table = 'tblcosting_project_stands';
    protected $guarded = [];

    public function stand()
    {
        return $this->hasOne('App\StandType', 'id', 'stand_type_id');
    }

    public function stage()
    {
        return $this->hasMany('App\CostForProject', 'id', 'stand_id');
    }
}