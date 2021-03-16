<?php

use Illuminate\Http\Request;
use Dingo\Api\Routing\Router;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/** @var Router $api */
$api = app(Router::class);

$api->version('v1', function (Router $api) {
    // Auth routes
    $api->group([
        'namespace' => 'App\Api\V1\Controllers\Auth'
    ], function (Router $api) {
        $api->post('auth/login', 'AuthController@login');
        $api->get('auth/user', 'AuthController@user')->middleware('jwt.auth');
        $api->post('auth/logout', 'AuthController@logout')->middleware('jwt.auth');
        $api->post('auth/refresh', 'AuthController@refresh');
    });

    // Public routes
    $api->group([
        'as' => 'public',
        'namespace' => 'App\Api\V1\Controllers'
    ], function (Router $api) {
        $api->get('test', 'TestController@get');
    });
});
