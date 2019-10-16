<?php
namespace App\Crawlers\Interfaces\Spider;

use App\Crawlers\Interfaces\CrawlerMapper;

/**
 * Created by PhpStorm.
 * User: Phuong Nguyen
 * Date: 14/10/2019
 * Time: 12:48 PM
 */
interface Builder{
    function build(string $url, string $content):CrawlerMapper;
}