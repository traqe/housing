<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Repayment extends Model
{
    protected $table='tblrepayment';
    protected $fillable=['account_no ','amount','payment_method_id ','created_at','updated'];
    public $timestamps =false;

    public function loan(){
        return $this->belongsTo(Loan::class, 'account_no');
    }

    public function paymentMethod(){
        return $this->belongsTo(PaymentMethod::class, 'payment_method_id');
    }
}
