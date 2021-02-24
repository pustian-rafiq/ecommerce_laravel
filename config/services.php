<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
     'google' => [
    'client_id' => '939041927606-b2tvfve41dhbmiem6opcqo7bfflcqokb.apps.googleusercontent.com',
    'client_secret' => 'alyygZpHTFRrIC7jPfymTYcb',
    'redirect' => 'http://localhost/ecommerce_laravel/callback/google',
  ],
   'github' => [
    'client_id' => '81a1d1192147e04fb656',
    'client_secret' => '9ab9cdada48750f9e38fb385965474684b8b1a34',
    'redirect' => 'http://localhost/ecommerce_laravel/callback/github',
  ],

];
