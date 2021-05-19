<?php

use Aws\Laravel\AwsServiceProvider;

return [
    'credentials' => [
        'key'    => env('AWS_ACCESS_KEY', ''),
        'secret' => env('AWS_SECRET_ACCESS_KEY', ''),
    ],
    'region' => env('AWS_REGION', 'us-east-1'),
    'version' => 'latest',
    
    // You can override settings for specific services
    'Ses' => [
        'region' => 'us-east-1',
    ],
];