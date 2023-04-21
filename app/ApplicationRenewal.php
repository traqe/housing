<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ApplicationRenewal extends Model
{
    protected $table = 'tblapplicationrenewal';
    protected $guarded = [];
}
