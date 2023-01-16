<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GraveOwner extends Model
{
    public $table = 'graveowner';
    protected $fillable =['name','surname','Identity_no','contact','receipt_no','amount','address','b_id'];

    // relationship to grave
    public function grave(){
        return $this->hasMany(Grave::class,'owner_id');
    }

    // relationship to deceased
   public function burials(){
       return $this->hasMany('App\Deceased','b_id','owner_id');
    }

    //relationship to receipts
    public function payment(){
        return $this->hasMany('App\CemeteryPayment','receipt_no','owner_id');
    }
    public function allocategrave(){
        return $this->hasOne(AllocateGrave::class);
    }
    
}
