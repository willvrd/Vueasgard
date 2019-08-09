<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/vueasgard'], function (Router $router) {
    $router->bind('article', function ($id) {
        return app('Modules\Vueasgard\Repositories\ArticleRepository')->find($id);
    });
    $router->get('articles', [
        'as' => 'admin.vueasgard.article.index',
        'uses' => 'ArticleController@index',
        'middleware' => 'can:vueasgard.articles.index'
    ]);
    $router->get('articles/create', [
        'as' => 'admin.vueasgard.article.create',
        'uses' => 'ArticleController@create',
        'middleware' => 'can:vueasgard.articles.create'
    ]);
    $router->post('articles', [
        'as' => 'admin.vueasgard.article.store',
        'uses' => 'ArticleController@store',
        'middleware' => 'can:vueasgard.articles.create'
    ]);
    $router->get('articles/{article}/edit', [
        'as' => 'admin.vueasgard.article.edit',
        'uses' => 'ArticleController@edit',
        'middleware' => 'can:vueasgard.articles.edit'
    ]);
    $router->put('articles/{article}', [
        'as' => 'admin.vueasgard.article.update',
        'uses' => 'ArticleController@update',
        'middleware' => 'can:vueasgard.articles.edit'
    ]);
    $router->delete('articles/{article}', [
        'as' => 'admin.vueasgard.article.destroy',
        'uses' => 'ArticleController@destroy',
        'middleware' => 'can:vueasgard.articles.destroy'
    ]);
// append

});
