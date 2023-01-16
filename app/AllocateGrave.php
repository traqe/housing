<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AllocateGrave extends Model
{
    protected $table = 'allocategrave';
    protected $fillable = ['grave_id','owner_id','updated_at','receipt','created_at','status'];

    public function grave(){
        return $this->belongsTo(Grave::class);
    }

        public function graveowner(){
        return $this->belongsTo(GraveOwner::class);
    }
}
