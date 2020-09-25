<?php

return [

    /*
    |--------------------------------------------------------------------------
    | WorldDataRepo Storage Driver
    |--------------------------------------------------------------------------
    |
    | This configuration value allows you to customize the storage options
    | for WorldDataRepo, such as the database connection that should be used
    | by WorldDataRepo's internal database models which store name id , etc.
    |
    */

    'database' => [
        'connection' => env('DB_CONNECTION', 'mysql'),
    ],

];
