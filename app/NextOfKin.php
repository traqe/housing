<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NextOfKin extends Model
{
    protected $table='tblnextofkin';
    protected $fillable=['person_id','fullname','telephone','address','email','relationship','created_by','created_at'];

    public function person()
    {
        return $this->belongsTo(Person::class);
    }



}
