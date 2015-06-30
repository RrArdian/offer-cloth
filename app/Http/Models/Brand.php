<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'brands';

    protected $hidden = ['created_at', 'updated_at'];

    public function users()
    {
    	return $this->belongsTo('App\User');
    }
}
