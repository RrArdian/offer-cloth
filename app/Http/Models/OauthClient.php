<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class OauthClient extends Model
{
    protected $table = 'oauth_clients';

    protected $hidden = ['created_at', 'updated_at'];
}
