<?php
return [
    'translation' => [
        'default_provider' => 'mymemory', // mymemory, google, azure, libretranslate

        'providers' => [
            'mymemory' => [
                'name' => 'MyMemory Translation',
                'url' => 'https://api.mymemory.translated.net/get',
                'method' => 'GET',
                'free' => true,
                'limits' => [
                    'daily' => 1000,
                    'monthly' => 10000
                ]
            ],

            'google' => [
                'name' => 'Google Cloud Translation',
                'url' => 'https://translation.googleapis.com/language/translate/v2',
                'method' => 'POST',
                'free' => false,
                'api_key_required' => true
            ],

            'libretranslate' => [
                'name' => 'LibreTranslate',
                'url' => 'http://localhost:5000/translate', // Self-hosted
                'method' => 'POST',
                'free' => true,
                'self_hosted' => true
            ]
        ]
    ]
];
?>