<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'tbltransaction';
    protected $fillable=['loan_id','transaction_type_id','Amount','balance','user_id','created_at','updated_at','description'];
    //public $timestamps= false;

    public function transactiontype()
    {
        return $this->belongsTo(TransactionType::class, 'transaction_type_id','id');
    }

    public function loan(){
        return $this->belongsTo(Loan::class);
    }

    public function fee()
    {
        return $this->belongsTo(FeeStructure::class);
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }


}
