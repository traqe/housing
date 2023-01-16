<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    protected $table = 'tblemployer';
    public $timestamps = false;
    protected $fillable=['employer_name','telephone','address','contact_person'];
}
