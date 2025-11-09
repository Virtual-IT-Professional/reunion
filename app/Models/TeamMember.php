<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    protected $fillable = [
        'name','role','department','avatar','facebook','twitter','google','instagram','ordering','active'
    ];
}
