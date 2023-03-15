<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Repossession extends Model
{   
    use SoftDeletes;
    protected $table = 'tblrepossessions';
    public $timestamps = false;
    protected $fillable = ['application_id', 'stand_id', 'reason', 'repossession_date', 'captured_by', 'allocation_id', 'stand_batch_id', 'decision', 'approved_by', 'approved_at', 'created_at', 'repayment_amount', 'repayment_percentage', 'amount_paid', 'processed','deleted_at'];

    public function approver()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    public function reinstatement()
    {
        return $this->hasOne(Reinstatement::class);
    }
}
