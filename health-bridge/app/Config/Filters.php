<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Filters extends BaseConfig
{
    public $aliases = [
        'csrf' => \CodeIgniter\Filters\CSRF::class,
        'toolbar' => \CodeIgniter\Filters\DebugToolbar::class,
        'UserFilter' => \App\Filters\UserFilter::class, // Register filter
    ];

    public $globals = [
        'before' => [
            'csrf',
            'UserFilter', // Apply globally
        ],
        'after' => [
            'toolbar',
        ],
    ];
}
