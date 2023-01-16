<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityComment extends Model
{
    //

    protected $table = 'ARCommCatDet';
    public $timestamps = false;
    public $primaryKey = 'CommID';
    public $fillable = ['CommCatID', 'Comment','Code'];


}
