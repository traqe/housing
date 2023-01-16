<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeeStructure extends Model
{
    protected $table='tblfeestructure';
    protected $fillable=['year','term','amount','details','created_by','updated_by'];

    public function transaction()
    {
        return $this->hasMany(Transaction::class, 'fee_id','id');
    }
}
