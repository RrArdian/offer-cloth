<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $hidden = ['created_at', 'updated_at'];

    public function products()
    {
    	return $this->hasMany('App\Http\Models\Product', 'category_id');
    }
}
