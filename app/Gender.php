<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Gender extends Model
{
    protected $fillable = ['gender'];
    protected $table = 'tblgenders';
    public $timestamps = false;

    public function person()
    {
        return $this->hasOne('App\Person');
    }
}
