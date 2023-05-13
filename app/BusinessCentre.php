<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessCentre extends Model
{
    protected $table = 'tblbc';
    protected $guarded = [];

    public function ward()
    {
        return $this->belongsTo('App\Ward','ward_id');
    }
}
