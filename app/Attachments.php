<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attachments extends Model
{
    public $table = 'attachments';
    protected $primaryKey = 'id';
    protected $fillable =['filename','to_burial','updated_at','created_at'];

    
}