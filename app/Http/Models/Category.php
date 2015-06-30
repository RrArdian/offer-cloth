<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $hidden = ['created_at', 'updated_at'];

    public function items()
    {
    	return $this->hasOne('App\Http\Models\Item');
    }
}
