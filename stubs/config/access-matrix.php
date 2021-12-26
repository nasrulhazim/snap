<?php

return [
    'roles' => [
        'superadmin',
        'user',
    ],

    'roles_permissions' => [
        'update-user-profile' => [
            'user', 'superadmin'
        ],
    ],
];
