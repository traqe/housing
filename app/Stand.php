<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stand extends Model
{
    public $table = 'tblstands';
    //public $timestamps = false;
    //protected $primaryKey = 'stand_id';
    // protected $guard=[];
    protected $fillable = ['batch_id', 'stand_no', 'type', 'dvp_status', 'date', 'address', 'location', 'town_city', 'size', 'price', 'status', 'owner', 'developer', 'application_id', 'stand_batch_no', 'allo_batch_no', 'phase', 'serviced_status', 'stand_class', 'created_at', 'updated_at', 'created_by', 'repossessed', 'updated_by'];

    public function allocations()
    {
        return $this->hasMany(Allocation::class);
    }

    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }

    public function repossessions()
    {
        return $this->hasMany(Repossession::class);
    }
    public function stageinspection()
    {
        return $this->hasMany(StageInspection::class);
    }
}
