<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StageInspection extends Model
{
    protected $table = 'tblstageinspection';
    protected $fillable = ['id','stage','inspector_name','ins_status','receipt_no','amount','stand_id','ins_date'];

    public function stand(){
        return $this->belongsTo(Stand::class);
    }
}
