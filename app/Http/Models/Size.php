<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $table = 'sizes';

    protected $hidden = ['created_at', 'updated_at'];

    public function products()
    {
    	return $this->belongsTo('App\Http\Models\Product', 'product_id');
    }
}
