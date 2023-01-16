<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable=['student_id','amount','paymentmethod_id','payment_date'];
    protected $table = 'tblpayments';
    public $timestamps = false;
}
