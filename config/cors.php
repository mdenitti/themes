<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines what cross-origin operations may execute
    | in web browsers. You are free to adjust these settings as needed.
    |
    | To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */

// Paths ('paths'): Only routes matching these patterns will have CORS headers applied.
// The wildcard '*' allows all routes to be included. This is useful for APIs where you want to enable CORS for all endpoints.
// Allowed Methods ('allowed_methods'): Set to ['*'] allowing all HTTP methods (GET, POST, PUT, DELETE, etc.) from cross-origin requests.
// Allowed Origins ('allowed_origins'): Set to ['*'] permitting requests from any domain. For production, consider restricting this to specific domains.
// Allowed Headers ('allowed_headers'): Set to ['*'] accepting all HTTP headers in cross-origin requests.
// Supports Credentials ('supports_credentials'): Set to true, allowing cookies and authentication headers in cross-origin requests. This is important when your API needs to maintain authenticated sessions.

    'paths' => ['*'],

    'allowed_methods' => ['*'],

    'allowed_origins' => ['*'],

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => true,

];
