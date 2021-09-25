<?php

namespace App\Models;

class Role extends \Spatie\Permission\Models\Role
{
    const DEFAULT_ROLES = [
        'superadmin',
        'administrator',
        'user',
    ];

    protected $guarded = [
        'id',
    ];
}
