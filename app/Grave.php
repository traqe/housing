<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grave extends Model
{   
    public $table = 'grave';
    protected $fillable =['g_site','g_section','g_lot','g_no','g_batch','g_status','g_date','owner_id','address_lat','address_lon','grave_lat','grave_lon','updated_at','created_at'];

    public function owner(){
        return $this->belongsTo(GraveOwner::class);
    }
    public function deceased(){
        return $this->hasOne(Deceased::class);
    }
    public function allocategrave(){
        return $this->hasOne(AllocateGrave::class);
    }
}
