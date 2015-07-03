<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table = 'photos';

    protected $hidden = ['created_at', 'updated_at'];

    public function products()
    {
        return $this->belongsTo('App\Http\Models\Photo', 'product_id');
    }
}
