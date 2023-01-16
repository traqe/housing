<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table='tblclient';
    public $timestamps = false;
    protected $fillable = ['clientNo','office_id','person_id','bank_name','trandate','statusId','typeId','category_Id','staff','net_salary','employment_type_id','bank_branch','account_name','account_number','account_type','employer_id','g_name','g_address','g_id_number','g_ec_number','g_phone','g_work_place','g_bank','g_bank_account_name','g_account_number'];

    public function person()
    {
        return $this->belongsTo(Person::class);
    }

    public function loan()
    {
        return $this->hasMany(Loan::class,'clientid')->orderBy('created_at','desc');
    }

    public function hasActiveLoans(){
        $loans = $this->loan->where('rollover_status_id', 1)->where('loan_balance','>', 0);
        if ($loans->count() > 0){
            return true;
        }
        return false;
    }

    public function employer(){
        return $this->belongsTo(Employer::class);
    }

    public function transactions(){
        return $this->hasManyThrough(Transaction::class, Loan::class,'clientid', 'loan_id')->orderBy('created_at','desc');
    }

}
