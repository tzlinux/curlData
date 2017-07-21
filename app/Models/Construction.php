<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Construction extends Model 
{
    protected $guarded = [];
    protected $table = 'constructions';
    protected $casts = [
        'bidders' => 'array'
    ];
}
