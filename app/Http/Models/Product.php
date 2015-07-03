<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $hidden = ['created_at', 'updated_at'];

    public function categories()
    {
    	return $this->belongsTo('App\Http\Models\Category', 'category_id');
    }

    public function brands()
    {
    	return $this->belongsTo('App\Http\Models\Brand', 'brand_id');
    }

    public function photos()
    {
        return $this->hasMany('App\Http\Models\Photo', 'product_id');
    }

    public function sizes()
    {
        return $this->hasMany('App\Http\Models\Size', 'product_id');
    }
}
