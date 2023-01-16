<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StandConfig extends Model
{
    protected $table = 'tblstandconfigs';
    protected $fillable = ['stand_type_id', 'number_of_stands', 'created_by', 'updated_by', 'updated_at', 'stand_class_id'];
    public $timestamps = false;

    public function standtype()
    {
        return $this->belongsTo(StandType::class, 'stand_type_id');
    }

    public function standclass()
    {
        return $this->belongsTo(StandClass::class, 'stand_class_id');
    }
}
