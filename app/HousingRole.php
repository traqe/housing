<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HousingRole extends Model
{
    protected $table = 'user_role';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\HousingRole', 'user_id');
    }
}
