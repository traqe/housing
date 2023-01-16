<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CurrentSession extends Model
{
    protected $table = 'tblcurrentsession';
    protected $fillable =['year','term','created_by','updated_by','created_by'];
}
