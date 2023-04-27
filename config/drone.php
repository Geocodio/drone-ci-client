<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Drone server URL
    |--------------------------------------------------------------------------
    |
    | The base URL for the drone server that we want to access
    |
    */

    'server' => env('DRONE_SERVER', 'https://drone.mysite.com'),

    /*
    |--------------------------------------------------------------------------
    | Drone personal token
    |--------------------------------------------------------------------------
    |
    | The personal drone token which can be found on the user settings page
    |
    */

    'token' => env('DRONE_TOKEN', '')

];
