<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class YearFinList extends Model
{
    protected $table ='YearFinList';
    public $timestamps = false;
    protected $fillable = ['YearEnding','DateFrom','DateTo','Closed','ClosedOn'];
    protected  $primaryKey='YearEnding';
}
