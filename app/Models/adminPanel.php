<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class adminPanel extends Model
{
    // Allow mass assignment for profile fields
    protected $fillable = [
        'adminName',
        'phone',
        'emailAddress',
        'department',
        'shift',
        'volantiarId',
        'volantiarType',
        'adminType',
        'password',
        'batchSession',
        'status',
        'comment',
        'avatar',
    ];

    // Hide sensitive fields
    protected $hidden = [
        'password',
    ];
}
