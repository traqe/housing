<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupPeople extends Model
{
    protected $table = 'tblGrouppeople';
    public $timestamps = false;
    protected $fillable = ['groupid','staffid','personTitle','personLastName','personFirstName'];

    public function Staff()
    {
        return $this->belongsTo(Staff::class, 'staffid', 'StaffID');
    }
}
