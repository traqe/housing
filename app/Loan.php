<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $table='tblloanevent';
    protected $fillable= ['counter','account_no','clientid','principal','loan_product_id','loan_status_id','rollover_status_id','loan_type_id','loan_balance','total_Amount','adminfee','created_at'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'loan_product_id');
    }
    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }
    public function client(){
        return $this->belongsTo(Client::class, 'clientid');
    }
}
