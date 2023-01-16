<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicationStage extends Model
{
    protected $table ='tblapplicationstages';
    protected $fillable = ['stage'];
    public $timestamps = false;
}
