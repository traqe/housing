<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailGroup extends Model
{
    protected $table='tblemailgroup';
    public $timestamps = false;
    protected $fillable=['groupname','type'];

    public function members()
    {
        return $this->hasMany(GroupPeople::class, 'groupid');
    }


}
