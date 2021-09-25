<?php

namespace App\Concerns\Relationships;

trait BelongsToTeam
{
    public function team()
    {
        return $this->belongsTo(\App\Models\Team::class)->withDefault();
    }
}
