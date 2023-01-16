<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cession extends Model
{
    protected $table ='tblcession';
    protected $fillable =['from_person', 'to_person','stand_id', 'reason','updated_at','status','created_at','created_by', 'witness'];

    public function owner(){
        return $this->belongsTo(Person::class, 'from_person');
    }

    public function beneficiary(){
        return $this->belongsTo(Person::class, 'to_person');
    }

    public function stand(){
        return $this->belongsTo(Stand::class);
    }

    public function allocations()
    {
        return $this->morphMany(Allocation::class, 'application')->where('current_status','CURRENT')->where('status','APPROVED');
    }


}
