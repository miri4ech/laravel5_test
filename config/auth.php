<?php

return [

    'defaults' => [
        'guard' => 'hogehoge',
        'passwords' => 'users',
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
        'api' => [
            'driver' => 'token',
            'provider' => 'users',
        ],
        'hogehoge' => [
            'driver' => 'session',
            'provider' => 'fuga',
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
        'fuga' => [
            'driver' => 'eloquent',
            'model' => App\Models\Event::class,
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
