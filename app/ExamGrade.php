<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamGrade extends Model
{
    protected $table='tblexamgrade';
    protected $fillable=['examid','gradeid','created_by','updated_by'];

    public function grade()
    {
        return $this->belongsTo('App\Grade','gradeid');
    }
}
