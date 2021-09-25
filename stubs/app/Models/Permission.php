<?php

namespace App\Models;

class Permission extends \Spatie\Permission\Models\Permission
{
    const DEFAULT_PERMISSIONS = [
        'create',
        'read',
        'update',
        'delete',
    ];

    protected $guarded = [
        'id',
    ];
}
