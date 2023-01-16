<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDueDate extends Model
{
    protected $table='tblloanproductduedate';
    public $timestamps = false;
    protected $guarded =[];
}
