<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token', 'updated_at'];

    public function roles()
    {
        return $this->belongsToMany('App\Http\Models\Role');
    }

    public function assignRole($role)
    {
        return $this->roles()->attach($role);
    }

    public function revokeRole($role)
    {
        return $this->roles()->detach($role);
    }

    public function hasRole($name)
    {
        foreach ($this->roles as $role)
        {
            if ($role->name === $name) return true;
        }

        return false;
    }

    public function brands()
    {
        return $this->hasOne('App\Http\Models\Brand');
    }

    public function customers()
    {
        return $this->hasOne('App\Http\Models\Customer');
    }
}
