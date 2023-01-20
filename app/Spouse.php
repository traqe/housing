<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spouse extends Model
{
    protected $table = 'tblspouse';
    protected $fillable = ['name', 'surname', 'title', 'nationalid', 'gender_id', 'mobile', 'address', 'marriage_cert', 'occupation', 'date_marriage', 'income', 'person_id'];
    public $timestamps = false;

    public function person()
    {
        return $this->BelongsTo(Person::class);
    }
    public function gender()
    {
        return $this->belongsTo(Gender::class, 'gender_id');
    }
}
