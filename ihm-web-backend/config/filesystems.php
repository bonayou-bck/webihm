<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DISK', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been set up for each driver as an example of the required values.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
            'throw' => false,
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
            'throw' => false,
        ],

        'uploads-slides' => [
            'driver' => 'local',
            'root' => storage_path('app/public/uploads/slides'),
            'url' => env('APP_URL').'/storage/uploads/slides',
            'visibility' => 'public',
            'throw' => false,
        ],

        'uploads-certification-logo' => [
            'driver' => 'local',
            'root' => storage_path('app/public/uploads/certification-logo'),
            'url' => env('APP_URL').'/storage/uploads/certification-logo',
            'visibility' => 'public',
            'throw' => false,
        ],

        'uploads-certificate' => [
            'driver' => 'local',
            'root' => storage_path('app/public/uploads/certificate'),
            'url' => env('APP_URL').'/storage/uploads/certificate',
            'visibility' => 'public',
            'throw' => false,
        ],

        'uploads-video' => [
            'driver' => 'local',
            'root' => storage_path('app/public/uploads/video'),
            'url' => env('APP_URL').'/storage/uploads/video',
            'visibility' => 'public',
            'throw' => false,
        ],

        'uploads-cover' => [
            'driver' => 'local',
            'root' => storage_path('app/public/uploads/cover'),
            'url' => env('APP_URL').'/storage/uploads/cover',
            'visibility' => 'public',
            'throw' => false,
        ],

        'uploads-contact' => [
            'driver' => 'local',
            'root' => storage_path('app/public/uploads/contact'),
            'url' => env('APP_URL').'/storage/uploads/contact',
            'visibility' => 'public',
            'throw' => false,
        ],

        'uploads-blog' => [
            'driver' => 'local',
            'root' => storage_path('app/public/uploads/blog'),
            'url' => env('APP_URL').'/storage/uploads/blog',
            'visibility' => 'public',
            'throw' => false,
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
            'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false),
            'throw' => false,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | `storage:link` Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],

];
