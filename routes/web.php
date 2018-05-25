<?php

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
    return view('welcome');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/wifi', function () {
    echo "V4szrVkbD4W#vDX18gtv,YOWIxr7nxr9#Y+h%g87je,UsUVz/Dk,m-T\wA1Y,sh";
});

Route::get('/test', function () {
    return view('test');
});

Route::get('/api/time', function () {
    list($usec, $sec) = explode(" ", microtime());
    $time = ((float)$usec + (float)$sec);

    return ['time' => round(microtime(true) * 1000)];
});

Route::get('video/{id}', 'VideoController@view');