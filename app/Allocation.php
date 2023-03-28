<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Allocation extends Model
{
    public $timestamps = false;
    protected $table = 'tblallocation';
    protected $fillable = ['status', 'application_id', 'stand_id', 'reason_resolution', 'authorised_by', 'updated_at', 'created_by', 'current_status', 'application_type'];

    public function application()
    {
        return $this->morphTo();
    }

    public function cession()
    {
        return $this->belongsTo(cession::class);
    }

    public function stand()
    {
        return $this->belongsTo(Stand::class);
    }

    public function allocable()
    {
        return $this->morphTo();
    }

    // public function owner()
    // {
    //     return $this->morphTo();
    // }

    public function person()
    {
        return $this->hasManyThrough(Person::class, Application::class);
    }
}
