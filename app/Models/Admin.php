<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'id' => 'integer',
        'password' => 'hashed',
    ];

    public $timestamps = false;
}
