<?php

return [

    'defaults' => [
        'guard' => 'student',
        'passwords' => 'students',
    ],

    'guards' => [
        'student' => [
            'driver' => 'session',
            'provider' => 'students',
        ],
        'admin' => [
            'driver' => 'session',
            'provider' => 'admins',
        ],
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],      
    ],


    'providers' => [
        'students' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],
        'admins' => [
            'driver' => 'eloquent',
            'model' => App\Models\Admin::class,
        ],
    ],


    'passwords' => [
        'students' => [
            'provider' => 'student',
            'email' => 'student.login.emails.password',
            'table' => 'password_resets',
            'expire' => 60,
        ],
        'admins' => [
            'provider' => 'admins',
            'email' => 'admin.login.emails.password',
            'table' => 'password_resets',
            'expire' => 60,
        ],
    ],

];
