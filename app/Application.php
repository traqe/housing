<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    public $timestamps = false;
    protected $table = 'tblapplications';

    public $fillable = [
        'applicant_id', 'stand_id', 'stand_type_id', 'created_at', 'created_by', 'application_stage_id', 'batch_id', 'receipt', 'details', 'nature_of_dev', 'place_of_intent',  'details_of_owned', 'capital_amount', 'other_info', 'no_of_dependants', 'num_of_years_in_council', 'expiry_date', 'updated_by', 'updated_at', 'partner_id'
    ];

    public function standType()
    {
        return $this->belongsTo(StandType::class, 'stand_type_id');
    }

    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }

    public function stage()
    {
        return $this->belongsTo(ApplicationStage::class, 'application_stage_id');
    }

    public function applicant()
    {
        return $this->belongsTo(Person::class, 'applicant_id');
    }

    // public function allocation(){
    //     return $this->hasOne(Allocation::class);
    // }

    public function allocations()
    {
        return $this->morphMany(Allocation::class, 'application')->where('current_status', 'CURRENT')->where('status', 'APPROVED');
    }

    public function unApprovedAllocations()
    {
        return $this->morphMany(Allocation::class, 'application')->where('current_status', 'CURRENT');
    }
}
