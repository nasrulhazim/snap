<?php

namespace App\Models;

class Role extends \Spatie\Permission\Models\Role
{
    public const DEFAULT_ROLES = [
        'superadmin',
        'user',
    ];

    protected $guarded = [
        'id',
    ];
}
