<?php

return [
    'oracle' => [
        'driver'         => 'oracle',
        'host'           => env('DB_HOST', '127.0.0.1'),
        'port'           => env('DB_PORT', '1521'),
        'database'       => env('DB_DATABASE', 'XE'),
        'service_name'   => env('DB_SERVICE_NAME', 'XE'),
        'username'       => env('DB_USERNAME', 'system'),
        'password'       => env('DB_PASSWORD', ''),
        'charset'        => 'AL32UTF8',
        'prefix'         => '',
        'prefix_schema'  => '',
        'edition' => env('DB_EDITION', 'ora$base'),
        'server_version' => env('DB_SERVER_VERSION', '11g'),
        'load_balance' => env('DB_LOAD_BALANCE', 'yes'),
        'max_name_len' => env('ORA_MAX_NAME_LEN', 30),
        'dynamic' => [],
        'sessionVars' => [
            'NLS_TIME_FORMAT' => 'HH24:MI:SS',
            'NLS_DATE_FORMAT' => 'YYYY-MM-DD HH24:MI:SS',
            'NLS_TIMESTAMP_FORMAT' => 'YYYY-MM-DD HH24:MI:SS',
            'NLS_TIMESTAMP_TZ_FORMAT' => 'YYYY-MM-DD HH24:MI:SS TZH:TZM',
            'NLS_NUMERIC_CHARACTERS' => '.,',
        ],
    ],
];
