<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_role extends Model
{
    protected $table = 'user_role';
    public $timestamps = false;
    protected $fillable=['role_id','user_id'];
}
