<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    protected $casts = [
        'name' => 'array',
        'region' => 'array',
    ];

    protected $guarded = [];
}
