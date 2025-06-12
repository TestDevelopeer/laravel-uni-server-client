<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApiToken extends Model
{
    protected $fillable = [
        'user_id',
        'token',
        'app_name',
    ];
}
