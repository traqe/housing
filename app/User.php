<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $table ='users';

    //protected $table = 'tbluser';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','staff_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_id');
    }

    public function roles()
    {
        return $this->hasManyThrough(
            'App\Role',
            'App\user_role',
            'user_id', // Foreign key on users table...
            'id', // Foreign key on posts table...
            'id', // Local key on countries table...
            'role_id' // Local key on users table...
        );
        //return $this->belongsToMany(Role::class, 'user_role', 'user_id', 'role_id', 'RoleID');
    }

    public function float(){
        return $this->hasMany(FloatBalance::class, 'created_by')->orderBy('id', 'desc')->first();
    }

    public function balance(){
        return $this->float() != null ? $this->float()->float_balance : 0;
    }

    public function hasAnyRole($roles)
    {
        if (is_array($roles))
        {
            foreach ($roles as $role)
            {
                if ($this->hasRole($role))
                {
                    return true;
                }
            }
        }
        else
        {
            if ($this->hasRole($roles))
            {
                return true;
            }
        }
        return false;
    }

    public function hasRole($role)
    {
        if ($this->roles()->where(['role'=>$role])->first())
        {
            return true;
        }
        return false;
    }

    public function floatBalances(){
        return $this->hasMany(FloatBalance::class,'created_by')->orderby('id', 'desc');
    }

    public function floatbalance(){
        return $this->floatBalances->first()->float_balance;
    }

}
