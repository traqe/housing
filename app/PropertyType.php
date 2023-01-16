<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropertyType extends Model
{
    public $table = 'property_type';
    protected $fillable =['type','updated_at','created_at'];
}
