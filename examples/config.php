<?php

return [

    'default' => $_ENV['SHASHA_PROVIDER'] ?? 'tmdb',

    'cache' => false,

    'providers' => [
        'tmdb' => [
            'apikey' => $_ENV['TMDB_KEY'] ?? null,
        ],
    ],
];