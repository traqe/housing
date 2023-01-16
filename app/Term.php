<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    public $timestamps = false;
    protected  $primaryKey = 'TermID';
    protected $table='TermDates';
    protected $fillable=['TermYear','Term','StartDate','EndDate','Closed', 'RollOver'];

}
