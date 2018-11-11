<?php

return [
    /*
    |--------------------------------------------------------------------------
    | reCAPTCHA v3 keys
    |--------------------------------------------------------------------------
    |
    | Keys used for the Google reCAPTCHA v3 API
    |
 */

    'default' => env('QUEUE_CONNECTION', 'sync'),
    'v3_site_key' => env('RECAPTCHA_V3_SITE_KEY', null),
    'v3_secret_key' => env('RECAPTCHA_V3_SECRET_KEY', null),
    'v3_api_url' => env('https://www.google.com/recaptcha/api/siteverify'),
];
