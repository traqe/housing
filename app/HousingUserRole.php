<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HousingUserRole extends Model
{
    protected $table = 'roles';
    protected $guarded = [];

    public function userRole()
    {
        //
    }
}
