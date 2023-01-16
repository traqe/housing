<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beneficiary extends Model
{
    protected $table = 'tblbeneficiaries';
    protected $fillable = ['name', 'relation', 'age', 'sex', 'occupation', 'income'];

    public function person()
    {
        return $this->BelongsTo(Person::class);
    }
}
