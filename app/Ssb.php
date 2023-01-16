<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ssb extends Model
{
    protected $fillable=['Amount','EmployeeId'];
    public $timestamps = false;
    protected $table = 'ssb';

    public function client(){
        return $this->belongsTo(Client::class, 'EmployeeId','clientNo');
    }


}
