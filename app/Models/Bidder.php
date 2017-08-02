<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bidder extends Model
{
    protected $guarded = [];
    protected $table = 'bidder';
    protected $casts = [
        'bidders' => 'array'
    ];
}
