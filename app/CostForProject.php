<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CostForProject extends Model
{
    protected $table = 'tblcost_for_projects';
    protected $guarded = [];

    public function stage()
    {
        return $this->hasOne('App\CostingStage', 'id', 'stage_id');
    }
}