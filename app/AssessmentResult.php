<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssessmentResult extends Model
{
    protected $table = 'tblassessmentresult';
    protected $fillable = ['studentid', 'assessmentid', 'mark','created_by', 'updated_by'];

    public static function getMarks($assid, $stid)
    {
        return AssessmentResult::where(['studentid'=>$stid, 'assessmentid'=>$assid])->first()->mark;
    }

    public function assessment()
    {
        return $this->belongsTo('App\Assessment','assessmentid', 'id');
    }

}
