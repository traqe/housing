<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RuralLease extends Model
{
    protected $table = 'tblrural_lease';
    protected $fillable = ['lease_no', 'date_applied', 'expiry_date', 'area', 'stand_purpose', 'person_id', 'created_by', 'approved_status', 'lease_status'];

    public function person()
    {
        return $this->belongsTo(Person::class);
    }
}
