<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = 'tblpersons';
    protected $fillable = [
        'title', 'firstname', 'surname', 'nationalid',  'dob', 'gender_id', 'marital_id', 'email', 'mobile', 'address', 'birthplace', 'religion', 'telephone', 'nationality',  'created_by', 'updated_by', 'created_at', 'updated_at',
    ];

    public function gender()
    {
        return $this->belongsTo(Gender::class, 'gender_id');
    }

    public function marital()
    {
        return $this->belongsTo('App\Marital', 'marital_id');
    }

    public function nok()
    {
        return $this->hasOne('App\NextOfkin');
    }


    public function city()
    {
        return $this->belongsTo('App\City');
    }

    public function application()
    {
        return $this->hasMany(Application::class, 'applicant_id');
    }

    public function cop()
    {
        return $this->hasMany('App\CouncilProperty');
    }

    public function allocation(){

        return $this->hasManyThrough(Allocation::class, Application::class);
        
        
    }
}
