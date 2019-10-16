<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/


$router->group(['prefix' => 'api', 'middleware' => 'cors'], function () use ($router) {
    $router->post('crawl', 'CrawlController@postCrawl');
    $router->get('playlist', 'PlaylistController@index');
    $router->get('playlist/{id}', 'PlaylistController@show');
    $router->get('media', 'MediaController@index');
    $router->get('download/{id}', 'MediaController@download');
});
