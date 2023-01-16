<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentBalance extends Model
{
    protected $table = 'tblstudentbalances';
    protected $fillable = ['student_id','balance'];
    public  $timestamps = false;
}
