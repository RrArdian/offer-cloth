<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    protected $fillable = ['name'];

    protected $hidden = ['created_at', 'updated_at'];

    public function users()
    {
    	return $this->belongsToMany('User');
    }
}
