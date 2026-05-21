<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    protected $casts = [
        "title" => "array",
        "desc" => "array",
        "tag" => "array"
    ];

    protected $guarded = [];

    //
}
