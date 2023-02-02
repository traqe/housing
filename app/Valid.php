<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Valid extends Model
{
    protected $table = 'tblvalid';

    protected $fillable = ['due','value'];
}
