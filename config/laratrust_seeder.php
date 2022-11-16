<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'admin' => [
            'settings' => 'c,r,u,d',
            'users' => 'c,r,u,d',
            'categories' => 'c,r,u,d',
            'gifts' => 'c,r,u,d',
            'orders' => 'c,r,u,d',
            'reports' => 'c,r,u,d',
            'ratings' => 'c,r,u,d',
            'notifications' => 'c,r,u,d',
        ],
        'representative'=>[
            'profile' => 'r,u',
            'categories' => 'c,r,u,d',
            'gifts' => 'c,r,u,d',
            'orders' => 'c,r,u,d',
            'reports' => 'c,r,u,d',
            'ratings' => 'c,r,u,d',
            'notifications' => 'c,r,u,d',
        ],
        'user' => [
            'profile' => 'r,u',
            'categories' => 'r',
            'gifts' => 'r',
            'orders' => 'c,r,u,d',
            'reports' => 'c,r',
            'ratings' => 'c,r,u,d',
            'notifications' => 'r',
        ]
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
