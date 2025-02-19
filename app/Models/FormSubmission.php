<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormSubmission extends Model
{
    protected $fillable = [
        'user_id',
        'fname',
        'lname',
        'email',
        'phone',
        'address',
        'course',

    ];
}
