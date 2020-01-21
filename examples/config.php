<?php

return [

    'default' => $_ENV['SHASHA_PROVIDER'] ?? 'tmdb',

    'cache' => false,

    'services' => [
        'tmdb' => [
            'apikey' => $_ENV['TMDB_KEY'] ?? null,
        ],
    ],
];