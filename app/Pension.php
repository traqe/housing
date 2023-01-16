<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pension extends Model
{
    protected $fillable=['Amount','EmployeeId'];
    public $timestamps = false;
    protected $table = 'pension';

    public function client(){
        return $this->belongsTo(Client::class, 'EmployeeId','clientNo');
    }


}
