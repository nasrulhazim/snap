<?php

namespace App\Models;

use App\Models\Base as Model;

class Lookup extends Model
{
    protected $casts = [
        'value' => 'array',
        'meta' => 'array',
    ];
}
