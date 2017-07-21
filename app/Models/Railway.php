<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Railway extends Model 
{
    protected $guarded = [];

    protected $casts = [
        'bidders' => 'array'
    ];
}
