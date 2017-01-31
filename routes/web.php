<?php

use Illuminate\Support\Facades\Redis;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // publish event with Redis
    $data = [
        'event' => 'UserSignedUp',
        'data' => [
            'username' => 'RikiSholi'
        ]
    ];

    Redis::publish('test-channel', json_encode($data));
    return 'Done';
    // node.js + redis subscribes to the event
    // use socket.io to emit to all client
});
