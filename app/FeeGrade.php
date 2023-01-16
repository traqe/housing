<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeeGrade extends Model
{
    protected $table='tblgradefee';
    protected $fillable=['gradeid','feeid','created_by','updated_by'];

    public function grade()
    {
        return $this->belongsTo('App\Grade', 'gradeid', 'id');
    }
    public function feestructure()
    {
        return $this->belongsTo('App\FeeStructure', 'feeid', 'id');
    }
}
