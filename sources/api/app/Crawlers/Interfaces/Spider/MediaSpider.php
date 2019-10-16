<?php
namespace App\Crawlers\Interfaces;

/**
 * Created by PhpStorm.
 * User: Phuong Nguyen
 * Date: 12/10/2019
 * Time: 12:37 AM
 */
interface MediaSpider{
    function run($url,$content);
}