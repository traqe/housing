<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FloatBalance extends Model
{
    protected $table ='tblfloatbalance';
    public $timestamps = false;
    protected $fillable=['transaction_id','Amount','float_balance','created_by','created_at'];


}
