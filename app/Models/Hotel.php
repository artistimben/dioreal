<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $casts = [
        "name" => "array",
        "tag" => "array",
        "desc" => "array",
        "long_desc" => "array",
        "gallery" => "array"
    ];

    protected $guarded = [];

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
}
