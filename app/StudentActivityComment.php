<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentActivityComment extends Model
{
    
    protected $table = 'ACMActivityStud';
    public $timestamps = false;
    public $primaryKey = 'ASID';

    public $fillable = ['ActID'
    ,'StudentID'
    ,'Comment1'];
}
