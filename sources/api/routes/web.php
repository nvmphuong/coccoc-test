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

use App\Crawlers\MediaCrawler;

$router->get('/', function () use ($router) {
    $url = 'https://www.nhaccuatui.com/playlist/chung-36-nguyen-van-chung.87nO9Iqw1F29.html';
    $result = MediaCrawler::run($url);
    dd($result);
});
$router->group(['prefix' => 'api', 'middleware' => 'cors'], function () use ($router) {
    $router->post('crawl', 'CrawlController@postCrawl');
    $router->get('playlist', 'PlaylistController@index');
    $router->get('playlist/{id}', 'PlaylistController@show');
    $router->get('medias', 'MediaController@index');
    $router->get('download/{id}', 'MediaController@download');
});
