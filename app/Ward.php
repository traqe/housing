<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    protected $table = 'tblward';
    protected $guarded = [];

    public function buscentre()
    {
        return $this->hasMany('App\BusinessCentre');
    }
}
