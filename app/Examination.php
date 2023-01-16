<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Examination extends Model
{
    protected $table='tblexaminations';
    public $timestamps = false;
    protected $fillable=['subject_id','grade_id','year','term','student_id','cw','exam','overallmark',
        'grade','comment','status'];
}
