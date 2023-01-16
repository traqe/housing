<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reinstatement extends Model
{
    // table we are using.
    protected $table = 'tblreinstatements';
    protected $fillable = ['reinstatement_date', 'repossession_id', 'captured_by', 'reason', 'approval_status', 'batch_no'];
    public $timestamps = false;

    //relationships
    public function repossession()
    {
        return $this->belongsTo(Repossession::class);
    }
}
