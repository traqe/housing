<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $table ='tblexams';
    protected $fillable = ['year','term','studentnumber','subject','assessment','exam','overall','comment','form_avg','set_avg','created_by','setId','grade','symbol'];

//    public function subject()
//    {
//        return $this->belongsTo('App\Subject', 'subjectid');
//    }

public $timestamps = false;


}
