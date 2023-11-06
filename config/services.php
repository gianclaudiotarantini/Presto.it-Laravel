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
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'github' => [
        'client_id' => 'b2ecb50be81baef0f8fe',
        'client_secret' => '916bf8290f4cabde8536da4067238a5ca4bb6f3f',
        'redirect' => 'http://127.0.0.1:8000/auth/callback',
    ],

    'google' => [
        'client_id' => '437483953480-0olaajjr8ntmorfmmms8fnca7t93vi26.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://127.0.0.1:8000/auth/google/callback',
    ],

];
