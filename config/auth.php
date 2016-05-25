<?php

return [

    'defaults' => [
        'guard' => 'users',
        'passwords' => 'users',
    ],

    'guards' => [
        'users' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
        'admin' => [
            'driver' => 'session',
            'provider' => 'admin',
        ],
    ],


    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],
        'admin' => [
            'driver' => 'eloquent',
            'model' => App\Models\Admin::class,
        ],
    ],


    'passwords' => [
        'users' => [
            'provider' => 'users',
            'email' => 'users.auth.emails.password',
            'table' => 'multiauth_password_resets',
            'expire' => 60,
        ],
        'admin' => [
            'provider' => 'admin',
            'email' => 'users.auth.emails.password',
            'table' => 'multiauth_password_resets',
            'expire' => 60,
        ],
    ],

];
