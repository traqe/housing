<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionType extends Model
{
    protected $table = 'tbltransactiontype';
    public $timestamps = false;
    protected $fillable=['transaction'];
}
