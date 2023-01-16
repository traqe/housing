<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    protected $table ='tbldevelopers';
    protected $fillable=['name','telephone','address','created_at','updated_at','created_by','updated_by'];
    public $timestamps = false;
}
