<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marital extends Model
{
    protected $table ='tblmaritals';
    protected $fillable=['marital_status'];

    public function person()
    {
        return $this->hasOne('App\Person');
    }
}
