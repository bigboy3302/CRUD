<?php

return [
    '/' => 'BlogController@index',
    '/show/(\d+)' => 'BlogController@show',
    '/create' => 'BlogController@create',
    '/edit/(\d+)' => 'BlogController@edit',
    '/destroy/(\d+)' => 'BlogController@destroy', // Regulārā izteiksme, kas notver ID
    '/update/(\d+)' => 'BlogController@update',
];
