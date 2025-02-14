<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Network extends Model
{
    protected $fillable = [
        'refrral_code',
        'user_id',
        'parent_user_id',
    ];
}
