<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table='tblreport';
    public $timestamps=false;
    protected $fillable=['userid','transactionType','Amount','balance','description','created_at','updated_at'];
}
