<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    protected $table = 'tblassessment';
    protected $fillable = ['grade_id', 'subject_id', 'totalmark', 'weight', 'title', 'year', 'term', 'created_by', 'updated_by', 'updated_at'];

    public function grade()
    {
        return $this->belongsTo('App\Grade');
    }
    public  function subject()
    {
        return $this->belongsTo('App\Subject');
    }
    public  function assessmentresult()
    {
        return $this->hasMany('App\AssessmentResult','assessmentid','id');
    }



}
