<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('users', UserController::class);


    // Demo
    $router->resource('tests', Demo\TestController::class);

    $router->resource('one-to-one/articles', Demo\OneToOne\ArticleController::class);
    $router->resource('one-to-one/seo', Demo\OneToOne\SeoController::class);

    $router->resource('one-to-many/painters', Demo\OneToMany\PainterController::class);
    $router->resource('one-to-many/paintings', Demo\OneToMany\PaintingController::class);

    $router->resource('many-to-many/products', Demo\ManyToMany\ProductsController::class);
    $router->resource('many-to-many/attributes', Demo\ManyToMany\AttributesController::class);

});
