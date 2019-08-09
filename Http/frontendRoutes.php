<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/vueasgard'], function (Router $router) {

    $router->get('/{id}', [
        'as' => 'vueasgard.index',
        'uses' => 'PublicController@index'
    ]);
    
// append

});
