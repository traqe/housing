<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CemeteryPayment extends Model
{
    protected $table = 'payments';
    protected $primaryKey = 'receipt_no';
    protected $fillable = ['id','name','surname','receipt_no','amount','invoiced','created_at','update_at'];
}
