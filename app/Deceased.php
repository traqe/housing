<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deceased extends Model
{
    public $table = 'burials';
    protected $fillable =['d_name','d_surname','d_gender','d_dob','d_dod','d_internment_date','d_fpolicy','grave_id','r_name','r_contact','attachments_id','burial_order'];

    public function grave(){
        return $this->belongsTo(Grave::class);
    }
    
    public function images(){
        return $this->hasMany('App\Attachments','attachments_id','b_id');
    }
}
