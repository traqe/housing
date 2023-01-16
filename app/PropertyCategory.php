<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropertyCategory extends Model
{
    public $table = 'property_category';
    protected $fillable =['category','updated_at','created_at'];
}
