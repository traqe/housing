<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class TermActivity extends Model
{
    protected $table = 'ACMActivity';
    public $timestamps = false;
    public $primaryKey = 'ActID';

    public $fillable = ['TermYear'
    ,'Term'
    ,'GroupID'
    ,'CategoryID'
    ,'ActName'
    ,'ActAbbr'
    ,'ActLocation'
    ,'ActType'
    ,'Comments'
    ,'ApprovalType'
    ,'ChargeType'
    ,'Charge'
    ,'Colour'
    ,'ActRepID'
    ,'Seq'
    ,'PrevActID'
    ,'CodeID'
    ,'Capacity'];


    public function students()
    {
        return $this->hasMany(ActivityStudent::class, 'ActID','ActID');
    }
    public function teachers()
    {
        return $this->hasMany(ActivityStaff::class, 'ActID','ActID');
    }

    public function activity()
    {
        return $this->belongsTo(Activity::class,'CodeID','CodeID' );
    }

//    public function staff()
//    {
//        return $this->hasManyThrough(
//            'App\Staff',
//            'App\ActivityStaff',
//            'ActID', // Foreign key on users table...
//            'StaffID', // Foreign key on posts table...
//            'ActID', // Local key on countries table...
//            'StaffID' // Local key on users table...
//        );
//        //return $this->belongsToMany(Role::class, 'user_role', 'user_id', 'role_id', 'RoleID');
//    }

}
