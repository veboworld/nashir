<?php

return [

    'default' => env('SHASHA_DEFAULT', 'tmdb'),

    'cache' => env('SHASHA_CACHE', false),

    'services' => [
        'tmdb' => [
            'apikey' => env('TMDB_APIKEY', null),
        ],
    ],

    'timeout' => env('SHASHA_TIMEOUT', 5000),
];
