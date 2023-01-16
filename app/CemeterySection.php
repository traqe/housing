<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CemeterySection extends Model
{
    public $table = 'cemeterysections';
    protected $primaryKey = 'id';
    protected $fillable =['id','name','updated_at','created_at'];
}
