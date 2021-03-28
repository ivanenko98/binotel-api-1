<?php

return [
    'url' => env('BINOTEL_API_URL', 'https://api.binotel.com/api/'),
    'version' => env('BINOTEL_API_VERSION', '4.0'),
    'format' => env('BINOTEL_API_FORMAT', 'json'),
    'key' => env('BINOTEL_API_KEY', null),
    'secret' => env('BINOTEL_API_SECRET', null)
];
