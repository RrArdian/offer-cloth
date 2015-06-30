<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';

    protected $hidden = ['created_at', 'updated_at'];

    public function categories()
    {
    	return $this->belongsTo('App\Http\Models\Category');
    }

    public function brands()
    {
    	return $this->belongsTo('App\Http\Models\Brand');
    }
}
