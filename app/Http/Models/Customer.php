<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';

    protected $hidden = ['created_at', 'updated_at'];

    public function users()
    {
    	return $this->belongsTo('App\User');
    }
}
