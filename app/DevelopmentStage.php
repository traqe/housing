<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DevelopmentStage extends Model
{
    protected $fillable=['stage'];
    public $timestamps = false;
    protected $table = 'tbldevelopmentstages';
}
