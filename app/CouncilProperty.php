<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CouncilProperty extends Model
{
    public $table = 'council_property';
    protected $fillable =['name','property_address','property_use','validity_status','person_id','updated_at','created_at'];

    public function person(){
        return $this->belongsTo(Person::class);
    }
}
