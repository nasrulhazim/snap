<?php

namespace App\Concerns\Relationships;

trait BelongsToUser
{
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class)->withDefault();
    }
}
