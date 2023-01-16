<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='tblloanproduct';
    protected $fillable=['is_deleted','product_name','principal_amount','min_principal_amount','max_principal_amount',
        'interest_rate','entry_fee_rate','entry_fee','late_fee','installment_due_day_id','grace_period_on_late_repayment','charge_interest_on_grace_period'];
    public $timestamps=false;

    public function duedate()
    {
        return $this->belongsTo(ProductDueDate::class, 'installment_due_day_id');
    }

    public function isProductExpired(){
        if ($this->duedate->dueDate <= date('Y-m-d')){
            return true;
        }
        return false;
    }

    public function loans(){
        return $this->hasMany(Loan::class, 'loan_product_id');
    }
}
