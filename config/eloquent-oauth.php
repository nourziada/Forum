<?php

use App\User;

return [
    'model' => User::class,
    'table' => 'oauth_identities',
    'providers' => [
        'facebook' => [
            'client_id' => '130523957643704',
            'client_secret' => '0c06b9ab646225cd8b6487c5db21348e',
            'redirect_uri' => 'http://127.0.0.1:8000/forum/auth/facebook/callback',
            'scope' => [],
        ],
        'google' => [
            'client_id' => '12345678',
            'client_secret' => 'y0ur53cr374ppk3y',
            'redirect_uri' => 'https://example.com/your/google/redirect',
            'scope' => [],
        ],
        'github' => [
            'client_id' => 'f0226cf46f0d00b696c7',
            'client_secret' => 'e3e6db5ffbaec8bb6d314cf7c8fbf7cfa13ae0ff',
            'redirect_uri' => 'http://127.0.0.1:8000/forum/auth/github/callback',
            'scope' => [],
        ],
        'linkedin' => [
            'client_id' => '12345678',
            'client_secret' => 'y0ur53cr374ppk3y',
            'redirect_uri' => 'https://example.com/your/linkedin/redirect',
            'scope' => [],
        ],
        'instagram' => [
            'client_id' => 'd9192360b1e2476cb5a063820039b195',
            'client_secret' => '5af396cb862e49e0815797074d27cedc ',
            'redirect_uri' => 'http://127.0.0.1:8000/forum/auth/instagram/callback',
            'scope' => ['basic'],
        ],
        'soundcloud' => [
            'client_id' => '12345678',
            'client_secret' => 'y0ur53cr374ppk3y',
            'redirect_uri' => 'https://example.com/your/soundcloud/redirect',
            'scope' => [],
        ],
        
    ],
];
