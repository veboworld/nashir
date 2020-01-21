<?php

return [

    'default' => $_ENV['SHASHA_DEFAULT'] ?? 'tmdb',

    'cache' => false,

    'services' => [
        'tmdb' => [
            'apikey' => $_ENV['TMDB_KEY'] ?? null,
            'cache' => [
                'enable' => false,
                'path' => '',
            ],
        ],
    ],

    'timeout' => 10800,
];